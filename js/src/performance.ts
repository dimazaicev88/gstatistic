import {onCLS, onFCP, onINP, onLCP} from "web-vitals";
import {CLSMetric} from "web-vitals/src/types";

interface NavigationTiming {
    activationStart: number
    connectEnd: number
    connectStart: number
    decodedBodySize: number
    deliveryType: string
    domComplete: number
    domContentLoadedEventEnd: number
    domContentLoadedEventStart: number
    domInteractive: number
    domainLookupEnd: number
    domainLookupStart: number
    duration: number
    fetchStart: number
    firstInterimResponseStart: number
    loadEventEnd: number
    loadEventStart: number
    redirectCount: number
    redirectEnd: number
    redirectStart: number
    requestStart: number
    responseEnd: number
    responseStart: number
    transferSize: number
    timeServer: number
    timeResponse: number
    timeDom: number
    timeLoad: number
}


class PerformanceAnalyzer {
    readonly isSupportPerformance: boolean = performance && typeof performance.getEntriesByType === 'function';


    get performanceNavigationTiming(): NavigationTiming | {} {
        if (!this.isSupportPerformance) {
            return {};
        }

        const navigationTiming: PerformanceNavigationTiming = performance.getEntriesByType('navigation')[0];

        return {
            actS: navigationTiming.activationStart,
            conE: navigationTiming.connectEnd,
            conS: navigationTiming.connectStart,
            decBS: navigationTiming.decodedBodySize,
            delT: navigationTiming.deliveryType,
            domC: navigationTiming.domComplete,
            domCLEE: navigationTiming.domContentLoadedEventEnd,
            domCLES: navigationTiming.domContentLoadedEventStart,
            domI: navigationTiming.domInteractive,
            domLE: navigationTiming.domainLookupEnd,
            domLS: navigationTiming.domainLookupStart,
            dur: navigationTiming.duration,
            fetS: navigationTiming.fetchStart,
            firIRS: navigationTiming.firstInterimResponseStart,
            loadEE: navigationTiming.loadEventEnd,
            loadES: navigationTiming.loadEventStart,
            redC: navigationTiming.redirectCount,
            redE: navigationTiming.redirectEnd,
            redS: navigationTiming.redirectStart,
            reqS: navigationTiming.requestStart,
            resE: navigationTiming.responseEnd,
            resS: navigationTiming.responseStart,
            trS: navigationTiming.transferSize,
            time_server: navigationTiming.responseStart - navigationTiming.requestStart,
            time_response: navigationTiming.responseEnd - navigationTiming.responseStart,
            time_dom: navigationTiming.domContentLoadedEventEnd - navigationTiming.requestStart,
            time_load: navigationTiming.loadEventEnd - navigationTiming.requestStart
        };
    }


}


const url: string = '/gelf';




interface WebVitalsData {
    CLS?: number;
    tarCLS: string;
    INP?: number;
    tarINP: string;
    LCP?: number;
    tarLCP: string;
    FCP?: number;
}

const webVitalsData: WebVitalsData = {
    CLS: undefined,
    tarCLS: '',
    INP: undefined,
    tarINP: '',
    LCP: undefined,
    tarLCP: '',
    FCP: undefined,
};

const clientIP: string[] = [];
let isHuman: boolean = false;

setWebVitals();
// findIP();
detectHumanInteraction();
setEvents();

function setEvents(): void {
    if ('onvisibilitychange' in document) {
        document.addEventListener('visibilitychange', visibilitychangeHandler);
    } else {
        window.addEventListener('pagehide', sendData);
    }
}

function unsetEvents(): void {
    document.removeEventListener('visibilitychange', visibilitychangeHandler);
    window.removeEventListener('pagehide', sendData);
}

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

function setWebVitals(): void {
    const vitalsHandler = (metric: CLSMetric) => {
        if (metric.name === 'CLS') {
            webVitalsData.tarCLS = metric.attribution.largestShiftTarget || '';
        } else if (metric.name === 'INP') {
            webVitalsData.tarINP = metric.attribution.interactionTarget || '';
        } else if (metric.name === 'LCP') {
            webVitalsData.tarLCP = metric.attribution.element || '';
        }
        webVitalsData[metric.name] = metric.value;
    };

    onCLS(vitalsHandler, {reportAllChanges: true});
    onINP(vitalsHandler, {reportAllChanges: true});
    onLCP(vitalsHandler, {reportAllChanges: true});
    onFCP(vitalsHandler);
}

// function findIP(): void {
//     const ipHandler = (ip: string) => {
//         clientIP.push(ip);
//     };
//
//     const myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
//
//     if (!myPeerConnection) return;
//
//     const pc = new myPeerConnection({iceServers: []});
//
//     const noop = () => {
//     };
//     const localIPs: Record<string, boolean> = {};
//
//     const ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g;
//
//     if (!pc.createDataChannel) return;
//
//     pc.createDataChannel('');
//
//     pc.createOffer(sdp => {
//         sdp.sdp.split(' ').forEach(line => {
//             if (line.indexOf('candidate') < 0) return;
//             line.match(ipRegex)?.forEach(ipIterate);
//         });
//         pc.setLocalDescription(sdp, noop, noop);
//     }, noop);
//
//     pc.onicecandidate = ice => {
//         if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
//         ice.candidate.candidate.match(ipRegex).forEach(ipIterate);
//     };
//
//     function ipIterate(ip: string): void {
//         if (!localIPs[ip]) {
//             ipHandler(ip);
//         }
//         localIPs[ip] = true;
//     }
// }


function getNavigatorData(): Record<string, any> {
    const connection = navigator.connection || {};

    const browserInfo = detectBrowser(navigator.userAgent);
    const osInfo = detectOs(navigator.userAgent);

    return {
        deviceMemory: navigator.deviceMemory,
        cpus: navigator.hardwareConcurrency,
        user_agent: navigator.userAgent,
        browser: browserInfo.name,
        browserVersion: browserInfo.version,
        osN: osInfo.name,
        osV: osInfo.version,
        dType: osInfo.deviceType,

        downlink: connection.downlink,
        conType: connection.effectiveType,
        rtt: connection.rtt,
        saveData: connection.saveData
    };
}

function getScreenData(): Record<string, any> {
    return {
        avH: screen.availHeight,
        avW: screen.availWidth,
        height: screen.height,
        width: screen.width,

        inH: innerHeight,
        inW: innerWidth,

        orient: screen.orientation ? screen.orientation.type : undefined,

        dpr: devicePixelRatio
    };
}

function getLocationData(): Record<string, any> {
    return {
        host: location.hostname,

        url_short: location.href.replace(/#.*/, '').replace(/\?.*/, '').replace(/\/\d+(?=\/|$)/g, '/0-9').replace(/(\/|\/index\.php)$/, ''),
        referrer: document.referrer
    };
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
            if (value === undefined || value === NaN) {
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

function visibilitychangeHandler(): void {
    if (document.hidden) {
        sendData();
    }
}