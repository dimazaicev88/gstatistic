//TODO доделать анализ движения мыши, клики, scroll.
// https://github.com/TA3/web-user-behaviour/blob/master/userBehaviour.js


interface UserBehaviourConfig {
    userInfo?: boolean;
    clicks?: boolean;
    mouseMovement?: boolean;
    mouseMovementInterval?: number;
    mouseScroll?: boolean;
    mousePageChange?: boolean; // todo
    timeCount?: boolean;
    clearAfterProcess?: boolean; // todo
    processTime?: number | false;
    windowResize?: boolean;
    visibilitychange?: boolean;
    processData?: (results: any) => void;
}

interface Results {
    userInfo: {
        windowSize: [number, number];
        appCodeName: string;
        appName: string;
        vendor: string;
        platform: string;
        userAgent: string;
    };
    time: {
        startTime: number;
        currentTime: number;
        stopTime: number;
    };
    clicks: {
        clickCount: number;
        clickDetails: Array<[number, number, string, number]>;
    };
    mouseMovements: Array<[number, number, number]>;
    mouseScroll: Array<[number, number, number]>;
    contextChange: any[]; // todo
    windowSizes: Array<[number, number, number]>;
    visibilitychanges: Array<[string, number]>;
}

const userBehaviour = (() => {
    const defaults: UserBehaviourConfig = {
        userInfo: true,
        clicks: true,
        mouseMovement: true,
        mouseMovementInterval: 1,
        mouseScroll: true,
        mousePageChange: true, // todo
        timeCount: true,
        clearAfterProcess: true, // todo
        processTime: 15,
        windowResize: true,
        visibilitychange: true,
        processData(results) {
            console.log(results);
        },
    };

    let user_config: UserBehaviourConfig = {};

    const mem = {
        processInterval: null,
        mouseInterval: null,
        mousePosition: [],
        eventListeners: {
            scroll: null,
            click: null,
            mouseMovement: null,
            windowResize: null,
            visibilitychange: null
        },
        eventsFunctions: {
            scroll() {
                results.mouseScroll.push([window.scrollX, window.scrollY, getTimeStamp()]);
            },
            click(e: MouseEvent) {
                results.clicks.clickCount++;
            },
            mouseMovement(e: MouseEvent) {
                mem.mousePosition = [e.clientX, e.clientY, getTimeStamp()];
            },
            windowResize() {
                results.windowSizes.push([window.innerWidth, window.innerHeight, getTimeStamp()]);
            },
            visibilitychange() {
                results.visibilitychanges.push([document.visibilityState, getTimeStamp()]);
                processResults();
            }
        }
    };

    let results = {} as Results;

    function resetResults() {
        results = {
            userInfo: {
                windowSize: [window.innerWidth, window.innerHeight],
                appCodeName: navigator.appCodeName || '',
                appName: navigator.appName || '',
                vendor: navigator.vendor || '',
                platform: navigator.platform || '',
                userAgent: navigator.userAgent || ''
            },
            time: {
                startTime: 0,
                currentTime: 0,
                stopTime: 0,
            },
            clicks: {
                clickCount: 0,
                clickDetails: []
            },
            mouseMovements: [],
            mouseScroll: [],
            contextChange: [], // todo
            windowSizes: [],
            visibilitychanges: [],
        };
    }

    resetResults();

    function getTimeStamp(): number {
        return Date.now();
    }

    function config(ob: UserBehaviourConfig) {
        user_config = {};
        Object.keys(defaults).forEach((key) => {
            user_config[key as keyof UserBehaviourConfig] = ob[key as keyof UserBehaviourConfig] !== undefined ? ob[key as keyof UserBehaviourConfig] : defaults[key as keyof UserBehaviourConfig];
        });
    }

    function start() {

        if (Object.keys(user_config).length !== Object.keys(defaults).length) {
            console.log("no config provided. using default..");
            user_config = defaults;
        }

        if (user_config.timeCount) {
            results.time.startTime = getTimeStamp();
        }

        if (user_config.mouseMovement) {
            mem.eventListeners.mouseMovement = window.addEventListener("mousemove", mem.eventsFunctions.mouseMovement);
            mem.mouseInterval = setInterval(() => {
                if (mem.mousePosition.length) {
                    if (!results.mouseMovements.length ||
                        (mem.mousePosition[0] !== results.mouseMovements[results.mouseMovements.length - 1][0] &&
                            mem.mousePosition[1] !== results.mouseMovements[results.mouseMovements.length - 1][1])) {
                        results.mouseMovements.push(mem.mousePosition);
                    }
                }
            }, defaults.mouseMovementInterval * 1000);
        }

        if (user_config.clicks) {
            mem.eventListeners.click = window.addEventListener("click", mem.eventsFunctions.click);
        }

        if (user_config.mouseScroll) {
            mem.eventListeners.scroll = window.addEventListener("scroll", mem.eventsFunctions.scroll);
        }

        if (user_config.windowResize !== false) {
            mem.eventListeners.windowResize = window.addEventListener("resize", mem.eventsFunctions.windowResize);
        }

        if (user_config.visibilitychange !== false) {
            mem.eventListeners.visibilitychange = window.addEventListener("visibilitychange", mem.eventsFunctions.visibilitychange);
        }

        if (user_config.processTime !== false) {
            mem.processInterval = setInterval(() => {
                processResults();
            }, user_config.processTime * 1000);
        }
    }

    function processResults() {
        user_config.processData(result());

        if (user_config.clearAfterProcess) {
            resetResults();
        }
    }

    function stop() {

        if (user_config.processTime !== false && mem.processInterval) {
            clearInterval(mem.processInterval);
        }

        if (mem.mouseInterval) {
            clearInterval(mem.mouseInterval);
        }

        window.removeEventListener("scroll", mem.eventsFunctions.scroll);

        if (mem.eventListeners.click) {
            window.removeEventListener("click", mem.eventsFunctions.click);
        }

        window.removeEventListener("mousemove", mem.eventsFunctions.mouseMovement);

        if (mem.eventListeners.windowResize) {
            window.removeEventListener("resize", mem.eventsFunctions.windowResize);
        }

        if (mem.eventListeners.visibilitychange) {
            window.removeEventListener("visibilitychange", mem.eventsFunctions.visibilitychange);
        }

        results.time.stopTime = getTimeStamp();

        processResults();
    }

    function result(): Results {
        if (!user_config.userInfo && userBehaviour.showResult().userInfo !== undefined) {
            delete userBehaviour.showResult().userInfo;
        }

        if (user_config.timeCount) {
            results.time.currentTime = getTimeStamp();
        }

        return results;
    }

    function showConfig(): UserBehaviourConfig | typeof defaults {
        return Object.keys(user_config).length !== Object.keys(defaults).length ? defaults : user_config;
    }

    return {
        showConfig,
        config,
        start,
        stop,
        showResult: result,
        processResults
    };
})();


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