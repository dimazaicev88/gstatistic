// https://github.com/TA3/web-user-behaviour/blob/master/userBehaviour.js


interface MouseMovement {
    x: number;
    y: number;
    time: number;
}

class AnalyzeUserBehavior {

}


let mouseMovements: MouseMovement[] = [];
let clicks: number = 0;

document.addEventListener('mousemove', (event: MouseEvent) => {
    const movement: MouseMovement = {
        x: event.clientX,
        y: event.clientY,
        time: new Date().getTime()
    };
    mouseMovements.push(movement);
});

document.addEventListener('click', () => {
    clicks++;
});

// Function to analyze collected data
function analyzeMouseData(): void {
    const totalMovements: number = mouseMovements.length;
    const totalClicks: number = clicks;

    // Check for lack of movements
    if (totalMovements < 5) {
        console.log("Possible bot detected: Too few movements.");
    }

    // Check for rapid movements
    let rapidMovementCount: number = 0;
    for (let i = 1; i < totalMovements; i++) {
        const distance = Math.sqrt(
            Math.pow(mouseMovements[i].x - mouseMovements[i - 1].x, 2) +
            Math.pow(mouseMovements[i].y - mouseMovements[i - 1].y, 2)
        );
        const timeDiff = mouseMovements[i].time - mouseMovements[i - 1].time;
        if (distance > 50 && timeDiff < 100) { // Adjust thresholds as needed
            rapidMovementCount++;
        }
    }

    if (rapidMovementCount > 3) {
        console.log("Possible bot detected: Rapid movements.");
    }

    // Check for no clicks
    if (totalClicks === 0) {
        console.log("Possible bot detected: No clicks.");
    }

    // Additional analysis can be added here
}

// Call this function to analyze after a certain period or event
setTimeout(analyzeMouseData, 5000); // Analyze after 5 seconds