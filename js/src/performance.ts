import {onCLS, onFCP, onINP, onLCP} from "web-vitals";
import {CLSMetric, FCPMetric, INPMetric, LCPMetric, ReportOpts} from "web-vitals/src/types";
import {NavigationTiming, NavigatorData, ScreenData} from "./interfaces/interfaces";
import {UAParser} from "ua-parser-js";

class PerformanceAnalyzer {
    readonly isSupportPerformance: boolean = performance && typeof performance.getEntriesByType === 'function';
    private clsMetric: CLSMetric | null = null;
    private inpMetric: INPMetric | null = null;
    private lcpMetric: LCPMetric | null = null;
    private fcpMetric: FCPMetric | null = null;

    get navigatorData(): NavigatorData {
        const connection: NetworkInformation | undefined = navigator.connection;
        const uaParser = UAParser(navigator.userAgent);
        const navData: NavigatorData = {
            deviceMemory: navigator.deviceMemory,
            cpus: navigator.hardwareConcurrency,
            browser: uaParser.browser.name,
            browserVersion: uaParser.browser.version,
            osName: uaParser.os.name,
            osVersion: uaParser.os.version,
            osDeviceType: uaParser.device.type
        }

        if (!connection) {
            return navData;
        }

        navData.downLink = connection.downlink;
        navData.effectiveType = connection.effectiveType;
        navData.rtt = connection.rtt;
        navData.saveData = connection.saveData;

        return navData
    }

    get screenData(): ScreenData {
        return {
            screenAvailHeight: screen.availHeight,
            screenAvailWidth: screen.availWidth,
            screenHeight: screen.height,
            screenWidth: screen.width,
            innerHeight: innerHeight,
            innerWidth: innerWidth,
            screenOrientation: screen.orientation ? screen.orientation.type : undefined,
            devicePixelRatio: devicePixelRatio
        };
    }

    get performanceNavigationTiming(): NavigationTiming | {} {
        if (!this.isSupportPerformance) {
            return {};
        }

        const navigationTiming: PerformanceNavigationTiming = performance.getEntriesByType('navigation')[0];

        return {
            activationStart: navigationTiming.activationStart,
            connectEnd: navigationTiming.connectEnd,
            connectStart: navigationTiming.connectStart,
            decodedBodySize: navigationTiming.decodedBodySize,
            deliveryType: navigationTiming.deliveryType,
            domComplete: navigationTiming.domComplete,
            domContentLoadedEventEnd: navigationTiming.domContentLoadedEventEnd,
            domContentLoadedEventStart: navigationTiming.domContentLoadedEventStart,
            domInteractive: navigationTiming.domInteractive,
            domainLookupEnd: navigationTiming.domainLookupEnd,
            domainLookupStart: navigationTiming.domainLookupStart,
            duration: navigationTiming.duration,
            fetchStart: navigationTiming.fetchStart,
            firstInterimResponseStart: navigationTiming.firstInterimResponseStart,
            loadEventEnd: navigationTiming.loadEventEnd,
            loadEventStart: navigationTiming.loadEventStart,
            redirectCount: navigationTiming.redirectCount,
            redirectEnd: navigationTiming.redirectEnd,
            redirectStart: navigationTiming.redirectStart,
            requestStart: navigationTiming.requestStart,
            responseEnd: navigationTiming.responseEnd,
            responseStart: navigationTiming.responseStart,
            transferSize: navigationTiming.transferSize,
            timeServer: navigationTiming.responseStart - navigationTiming.requestStart,
            timeResponse: navigationTiming.responseEnd - navigationTiming.responseStart,
            timeDom: navigationTiming.domContentLoadedEventEnd - navigationTiming.requestStart,
            timeLoad: navigationTiming.loadEventEnd - navigationTiming.requestStart
        };
    }

    private removeEventListeners(): void {
        document.removeEventListener('visibilitychange', this.onVisibilitychangeHandler);
        window.removeEventListener('pagehide', sendData);
    }

    private addEventListeners(): void {
        if ('onvisibilitychange' in document) {
            document.addEventListener('visibilitychange', this.onVisibilitychangeHandler);
        } else {
            window.addEventListener('pagehide', sendData);
        }
    }

    onVisibilitychangeHandler(): void {
        if (document.hidden) {
            sendData();
        }
    }

    private catchWebVitals(): void {
        onCLS((metric: CLSMetric) => this.clsMetric = metric, {reportAllChanges: true});
        onINP((metric: INPMetric) => this.inpMetric = metric, {reportAllChanges: true});
        onLCP((metric: LCPMetric) => this.lcpMetric = metric, {reportAllChanges: true});
        onFCP((metric: FCPMetric) => this.fcpMetric = metric);
    }
}


const url: string = '/gelf';


const clientIP: string[] = [];
let isHuman: boolean = false;

detectHumanInteraction();


function detectHumanInteraction(): void {
    const humanEvents: string[] = ['touchstart', 'keydown', 'scroll', 'mousemove'];

    const handler = () => {
        isHuman = true;
        humanEvents.forEach(eventName => {
            window.removeEventListener(eventName, handler, false);
        });
    };

    humanEvents.forEach(eventName => {
        window.addEventListener(eventName, handler, false);
    });
}

function round(value: number, precision: number = 2): number {
    return +(Math.round(Number(value + 'e+' + precision)) + 'e-' + precision);
}

function getData(): Record<string, any> {
    const data: Record<string, any> = {
        version: '1.1',
        short_message: 'gelf',
        type: 'gelf',
        readyState: document.readyState,
        clientIP: clientIP.join('; ')
    };

    const customData: Record<string, any> = window._arGelfValue || window._jsErrorUserData || {};

    const dataSets: Array<Record<string, any>> = [
        getLocationData(),
        getScreenData(),
        getNavigatorData(),
        getPerformanceNavigationTiming(),
        webVitalsData,
        customData
    ];

    for (const dataCollection of dataSets) {
        for (let key in dataCollection) {
            data[key] = dataCollection[key];
        }
    }

    return data;
}

function sendData(): void {
    if (isHuman) {
        const data = getData();

        const jsonData: string = JSON.stringify(data, function (key, value) {
            if (value === undefined || isNaN(value)) {
                return null;
            }
            if (typeof value === 'number') {
                return round(value);
            }
            return value;
        });

        if ('sendBeacon' in navigator) {
            navigator.sendBeacon(url, jsonData);
        } else {
            const xhr: XMLHttpRequest = new XMLHttpRequest();
            xhr.open('POST', url, false);
            xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
            xhr.send(jsonData);
        }
        unsetEvents();
    }
}

// function visibilitychangeHandler(): void {
//     if (document.hidden) {
//         sendData();
//     }
// }