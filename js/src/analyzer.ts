interface MouseMovement {
    x: number;
    y: number;
    time: number;
}

class AnalyzeUserBehavior {
    private mouseMovements: MouseMovement[] = [];
    private clickCount: number = 0;
    private scrollCount: number = 0;
    private resizeCount: number = 0;
    private visibilityChangeCount: number = 0;

    private addListeners(): void {
        document.addEventListener('mousemove', this.mousemoveLister);
        document.addEventListener('click', this.clickListener);
        document.addEventListener("scroll", this.scrollListener);
        document.addEventListener("resize", this.resizeListener)
        document.addEventListener("visibilitychange", this.visibilityChangeListener);
    }

    private mousemoveLister(event: MouseEvent) {
        const movement: MouseMovement = {
            x: event.clientX,
            y: event.clientY,
            time: new Date().getTime()
        };
        this.mouseMovements.push(movement);
    }

    private resizeListener() {
        this.resizeCount++
    }

    private scrollListener() {
        this.scrollCount++
    }


    private clickListener(): void {
        this.clickCount++;
    }

    private visibilityChangeListener() {
        this.visibilityChangeCount++
    }

    stop() {
        document.removeEventListener('mousemove', this.mousemoveLister);
        document.removeEventListener('click', this.clickListener);
        document.removeEventListener("scroll", this.scrollListener);
        document.removeEventListener("resize", this.resizeListener)
        document.removeEventListener("visibilitychange", this.visibilityChangeListener);
    }

    private analyzeMouseData(): void {
        const totalMovements: number = this.mouseMovements.length;
        let rapidMovementCount: number = 0;

        for (let i = 1; i < totalMovements; i++) {
            const distance = Math.sqrt(
                Math.pow(this.mouseMovements[i].x - this.mouseMovements[i - 1].x, 2) +
                Math.pow(this.mouseMovements[i].y - this.mouseMovements[i - 1].y, 2)
            );
            const timeDiff = this.mouseMovements[i].time - this.mouseMovements[i - 1].time;
            if (distance > 50 && timeDiff < 100) { // Adjust thresholds as needed
                rapidMovementCount++;
            }
        }
    }

    start() {
        this.addListeners();
        this.analyzeMouseData();
    }
}