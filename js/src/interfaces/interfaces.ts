export interface WebVitalsData {
    CLS?: number;
    tarCLS: string;
    INP?: number;
    tarINP: string;
    LCP?: number;
    tarLCP: string;
    FCP?: number;
}

export const webVitalsData: WebVitalsData = {
    CLS: undefined,
    tarCLS: '',
    INP: undefined,
    tarINP: '',
    LCP: undefined,
    tarLCP: '',
    FCP: undefined,
};

export interface NavigationTiming {
    activationStart?: number
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

export interface NavigatorData {
    deviceMemory: number,
    cpus: number,
    browser?: string,
    browserVersion?: string,
    osName?: string,
    osVersion?: string,
    osDeviceType?: string,
    downLink?: number,
    effectiveType?: string,
    rtt?: number,
    saveData?: boolean
}

export interface ScreenData {
    screenAvailHeight: number,
    screenAvailWidth: number,
    screenHeight: number,
    screenWidth: number,
    innerHeight: number,
    innerWidth: number,
    screenOrientation?: ScreenOrientation | OrientationType,
    devicePixelRatio: number
}

export interface LocationData {
    host: string,
    urlShort: string,
    referrer: string
}