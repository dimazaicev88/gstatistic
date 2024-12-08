declare var performance: Performance;


/**
 * Provides access to performance-related information for the current page. It's part of the High Resolution Time API, but is enhanced by the Performance Timeline API, the Navigation Timing API, the User Timing API, and the Resource Timing API.
 *
 * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance)
 */
interface Performance extends EventTarget {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/eventCounts) */
    readonly eventCounts: EventCounts;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/navigation)
     */
    readonly navigation: PerformanceNavigation;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/resourcetimingbufferfull_event) */
    onresourcetimingbufferfull: ((this: Performance, ev: Event) => any) | null;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/timeOrigin) */
    readonly timeOrigin: DOMHighResTimeStamp;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/timing)
     */
    readonly timing: PerformanceTiming;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/clearMarks) */
    clearMarks(markName?: string): void;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/clearMeasures) */
    clearMeasures(measureName?: string): void;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/clearResourceTimings) */
    clearResourceTimings(): void;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/getEntries) */
    getEntries(): PerformanceEntryList;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/getEntriesByName) */
    getEntriesByName(name: string, type?: string): PerformanceEntryList;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/getEntriesByType) */
    getEntriesByType(type: string): PerformanceEntryList;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/mark) */
    mark(markName: string, markOptions?: PerformanceMarkOptions): PerformanceMark;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/measure) */
    measure(measureName: string, startOrMeasureOptions?: string | PerformanceMeasureOptions, endMark?: string): PerformanceMeasure;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/now) */
    now(): DOMHighResTimeStamp;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/setResourceTimingBufferSize) */
    setResourceTimingBufferSize(maxSize: number): void;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Performance/toJSON) */
    toJSON(): any;

    addEventListener<K extends keyof PerformanceEventMap>(type: K, listener: (this: Performance, ev: PerformanceEventMap[K]) => any, options?: boolean | AddEventListenerOptions): void;

    addEventListener(type: string, listener: EventListenerOrEventListenerObject, options?: boolean | AddEventListenerOptions): void;

    removeEventListener<K extends keyof PerformanceEventMap>(type: K, listener: (this: Performance, ev: PerformanceEventMap[K]) => any, options?: boolean | EventListenerOptions): void;

    removeEventListener(type: string, listener: EventListenerOrEventListenerObject, options?: boolean | EventListenerOptions): void;
}

declare var Performance: {
    prototype: Performance;
    new(): Performance;
};

/**
 * Encapsulates a single performance metric that is part of the performance timeline. A performance entry can be directly created by making a performance mark or measure (for example by calling the mark() method) at an explicit point in an application. Performance entries are also created in indirect ways such as loading a resource (such as an image).
 *
 * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceEntry)
 */
interface PerformanceEntry {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceEntry/duration) */
    readonly duration: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceEntry/entryType) */
    readonly entryType: string;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceEntry/name) */
    readonly name: string;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceEntry/startTime) */
    readonly startTime: DOMHighResTimeStamp;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceEntry/toJSON) */
    toJSON(): any;
}

declare var PerformanceEntry: {
    prototype: PerformanceEntry;
    new(): PerformanceEntry;
};

/** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceEventTiming) */
interface PerformanceEventTiming extends PerformanceEntry {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceEventTiming/cancelable) */
    readonly cancelable: boolean;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceEventTiming/processingEnd) */
    readonly processingEnd: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceEventTiming/processingStart) */
    readonly processingStart: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceEventTiming/target) */
    readonly target: Node | null;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceEventTiming/toJSON) */
    toJSON(): any;
}

declare var PerformanceEventTiming: {
    prototype: PerformanceEventTiming;
    new(): PerformanceEventTiming;
};

/**
 * PerformanceMark is an abstract interface for PerformanceEntry objects with an entryType of "mark". Entries of this type are created by calling performance.mark() to add a named DOMHighResTimeStamp (the mark) to the browser's performance timeline.
 *
 * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceMark)
 */
interface PerformanceMark extends PerformanceEntry {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceMark/detail) */
    readonly detail: any;
}

declare var PerformanceMark: {
    prototype: PerformanceMark;
    new(markName: string, markOptions?: PerformanceMarkOptions): PerformanceMark;
};

/**
 * PerformanceMeasure is an abstract interface for PerformanceEntry objects with an entryType of "measure". Entries of this type are created by calling performance.measure() to add a named DOMHighResTimeStamp (the measure) between two marks to the browser's performance timeline.
 *
 * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceMeasure)
 */
interface PerformanceMeasure extends PerformanceEntry {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceMeasure/detail) */
    readonly detail: any;
}

declare var PerformanceMeasure: {
    prototype: PerformanceMeasure;
    new(): PerformanceMeasure;
};

/**
 * The legacy PerformanceNavigation interface represents information about how the navigation to the current document was done.
 * @deprecated This interface is deprecated in the Navigation Timing Level 2 specification. Please use the PerformanceNavigationTiming interface instead.
 *
 * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigation)
 */
interface PerformanceNavigation {
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigation/redirectCount)
     */
    readonly redirectCount: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigation/type)
     */
    readonly type: number;

    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigation/toJSON)
     */
    toJSON(): any;

    readonly TYPE_NAVIGATE: 0;
    readonly TYPE_RELOAD: 1;
    readonly TYPE_BACK_FORWARD: 2;
    readonly TYPE_RESERVED: 255;
}

/** @deprecated */
declare var PerformanceNavigation: {
    prototype: PerformanceNavigation;
    new(): PerformanceNavigation;
    readonly TYPE_NAVIGATE: 0;
    readonly TYPE_RELOAD: 1;
    readonly TYPE_BACK_FORWARD: 2;
    readonly TYPE_RESERVED: 255;
};

/**
 * Provides methods and properties to store and retrieve metrics regarding the browser's document navigation events. For example, this interface can be used to determine how much time it takes to load or unload a document.
 *
 * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigationTiming)
 */
interface PerformanceNavigationTiming extends PerformanceResourceTiming {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigationTiming/domComplete) */
    readonly domComplete: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigationTiming/domContentLoadedEventEnd) */
    readonly domContentLoadedEventEnd: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigationTiming/domContentLoadedEventStart) */
    readonly domContentLoadedEventStart: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigationTiming/domInteractive) */
    readonly domInteractive: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigationTiming/loadEventEnd) */
    readonly loadEventEnd: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigationTiming/loadEventStart) */
    readonly loadEventStart: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigationTiming/redirectCount) */
    readonly redirectCount: number;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigationTiming/type) */
    readonly type: NavigationTimingType;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigationTiming/unloadEventEnd) */
    readonly unloadEventEnd: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigationTiming/unloadEventStart) */
    readonly unloadEventStart: DOMHighResTimeStamp;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceNavigationTiming/toJSON) */
    toJSON(): any;
}

declare var PerformanceNavigationTiming: {
    prototype: PerformanceNavigationTiming;
    new(): PerformanceNavigationTiming;
};

/** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceObserver) */
interface PerformanceObserver {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceObserver/disconnect) */
    disconnect(): void;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceObserver/observe) */
    observe(options?: PerformanceObserverInit): void;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceObserver/takeRecords) */
    takeRecords(): PerformanceEntryList;
}

declare var PerformanceObserver: {
    prototype: PerformanceObserver;
    new(callback: PerformanceObserverCallback): PerformanceObserver;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceObserver/supportedEntryTypes_static) */
    readonly supportedEntryTypes: ReadonlyArray<string>;
};

/** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceObserverEntryList) */
interface PerformanceObserverEntryList {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceObserverEntryList/getEntries) */
    getEntries(): PerformanceEntryList;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceObserverEntryList/getEntriesByName) */
    getEntriesByName(name: string, type?: string): PerformanceEntryList;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceObserverEntryList/getEntriesByType) */
    getEntriesByType(type: string): PerformanceEntryList;
}

declare var PerformanceObserverEntryList: {
    prototype: PerformanceObserverEntryList;
    new(): PerformanceObserverEntryList;
};

/** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformancePaintTiming) */
interface PerformancePaintTiming extends PerformanceEntry {
}

declare var PerformancePaintTiming: {
    prototype: PerformancePaintTiming;
    new(): PerformancePaintTiming;
};

/**
 * Enables retrieval and analysis of detailed network timing data regarding the loading of an application's resources. An application can use the timing metrics to determine, for example, the length of time it takes to fetch a specific resource, such as an XMLHttpRequest, <SVG>, image, or script.
 *
 * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming)
 */
interface PerformanceResourceTiming extends PerformanceEntry {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/connectEnd) */
    readonly connectEnd: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/connectStart) */
    readonly connectStart: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/decodedBodySize) */
    readonly decodedBodySize: number;
    /**[MDN Reference] (https://developer.mozilla.org/en-US/docs/Web/API/PerformanceResourceTiming/deliveryType)*/
    readonly  deliveryType: string;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/domainLookupEnd) */
    readonly domainLookupEnd: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/domainLookupStart) */
    readonly domainLookupStart: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/encodedBodySize) */
    readonly encodedBodySize: number;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/fetchStart) */
    readonly fetchStart: DOMHighResTimeStamp;
    /**[MDN Reference] (https://developer.mozilla.org/en-US/docs/Web/API/PerformanceResourceTiming/firstInterimResponseStart)*/
    readonly firstInterimResponseStart: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/initiatorType) */
    readonly initiatorType: string;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/nextHopProtocol) */
    readonly nextHopProtocol: string;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/redirectEnd) */
    readonly redirectEnd: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/redirectStart) */
    readonly redirectStart: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/requestStart) */
    readonly requestStart: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/responseEnd) */
    readonly responseEnd: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/responseStart) */
    readonly responseStart: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/responseStatus) */
    readonly responseStatus: number;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/secureConnectionStart) */
    readonly secureConnectionStart: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/serverTiming) */
    readonly serverTiming: ReadonlyArray<PerformanceServerTiming>;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/transferSize) */
    readonly transferSize: number;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/workerStart) */
    readonly workerStart: DOMHighResTimeStamp;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceResourceTiming/toJSON) */
    toJSON(): any;
}

declare var PerformanceResourceTiming: {
    prototype: PerformanceResourceTiming;
    new(): PerformanceResourceTiming;
};

/** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceServerTiming) */
interface PerformanceServerTiming {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceServerTiming/description) */
    readonly description: string;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceServerTiming/duration) */
    readonly duration: DOMHighResTimeStamp;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceServerTiming/name) */
    readonly name: string;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceServerTiming/toJSON) */
    toJSON(): any;
}

declare var PerformanceServerTiming: {
    prototype: PerformanceServerTiming;
    new(): PerformanceServerTiming;
};

/**
 * A legacy interface kept for backwards compatibility and contains properties that offer performance timing information for various events which occur during the loading and use of the current page. You get a PerformanceTiming object describing your page using the window.performance.timing property.
 * @deprecated This interface is deprecated in the Navigation Timing Level 2 specification. Please use the PerformanceNavigationTiming interface instead.
 *
 * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming)
 */
interface PerformanceTiming {
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/connectEnd)
     */
    readonly connectEnd: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/connectStart)
     */
    readonly connectStart: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/domComplete)
     */
    readonly domComplete: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/domContentLoadedEventEnd)
     */
    readonly domContentLoadedEventEnd: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/domContentLoadedEventStart)
     */
    readonly domContentLoadedEventStart: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/domInteractive)
     */
    readonly domInteractive: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/domLoading)
     */
    readonly domLoading: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/domainLookupEnd)
     */
    readonly domainLookupEnd: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/domainLookupStart)
     */
    readonly domainLookupStart: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/fetchStart)
     */
    readonly fetchStart: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/loadEventEnd)
     */
    readonly loadEventEnd: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/loadEventStart)
     */
    readonly loadEventStart: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/navigationStart)
     */
    readonly navigationStart: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/redirectEnd)
     */
    readonly redirectEnd: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/redirectStart)
     */
    readonly redirectStart: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/requestStart)
     */
    readonly requestStart: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/responseEnd)
     */
    readonly responseEnd: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/responseStart)
     */
    readonly responseStart: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/secureConnectionStart)
     */
    readonly secureConnectionStart: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/unloadEventEnd)
     */
    readonly unloadEventEnd: number;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/unloadEventStart)
     */
    readonly unloadEventStart: number;

    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/PerformanceTiming/toJSON)
     */
    toJSON(): any;
}

/** @deprecated */
declare var PerformanceTiming: {
    prototype: PerformanceTiming;
    new(): PerformanceTiming;
};