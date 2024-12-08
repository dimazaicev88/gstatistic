/** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Window/navigator) */
declare var navigator: Navigator;


/**
 * The state and the identity of the user agent. It allows scripts to query it and to register themselves to carry on some activities.
 *
 * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator)
 */
interface Navigator extends NavigatorAutomationInformation, NavigatorBadge, NavigatorConcurrentHardware, NavigatorContentUtils, NavigatorCookies, NavigatorID, NavigatorLanguage, NavigatorLocks, NavigatorOnLine, NavigatorPlugins, NavigatorStorage, NavigatorDeviceMemory {
    /**
     * Available only in secure contexts.
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/clipboard)
     */
    readonly clipboard: Clipboard;
    /**
     * Available only in secure contexts.
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/credentials)
     */
    readonly credentials: CredentialsContainer;
    readonly doNotTrack: string | null;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/geolocation) */
    readonly geolocation: Geolocation;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/maxTouchPoints) */
    readonly maxTouchPoints: number;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/mediaCapabilities) */
    readonly mediaCapabilities: MediaCapabilities;
    /**
     * Available only in secure contexts.
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/mediaDevices)
     */
    readonly mediaDevices: MediaDevices;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/mediaSession) */
    readonly mediaSession: MediaSession;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/permissions) */
    readonly permissions: Permissions;
    /**
     * Available only in secure contexts.
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/serviceWorker)
     */
    readonly serviceWorker: ServiceWorkerContainer;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/userActivation) */
    readonly userActivation: UserActivation;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/wakeLock) */
    readonly wakeLock: WakeLock;

    /**
     * Available only in secure contexts.
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/canShare)
     */
    canShare(data?: ShareData): boolean;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/getGamepads) */
    getGamepads(): (Gamepad | null)[];

    /**
     * Available only in secure contexts.
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/requestMIDIAccess)
     */
    requestMIDIAccess(options?: MIDIOptions): Promise<MIDIAccess>;

    /**
     * Available only in secure contexts.
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/requestMediaKeySystemAccess)
     */
    requestMediaKeySystemAccess(keySystem: string, supportedConfigurations: MediaKeySystemConfiguration[]): Promise<MediaKeySystemAccess>;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/sendBeacon) */
    sendBeacon(url: string | URL, data?: BodyInit | null): boolean;

    /**
     * Available only in secure contexts.
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/share)
     */
    share(data?: ShareData): Promise<void>;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/vibrate) */
    vibrate(pattern: VibratePattern): boolean;
}

declare var Navigator: {
    prototype: Navigator;
    new(): Navigator;
};

interface NavigatorAutomationInformation {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/webdriver) */
    readonly webdriver: boolean;
}

/** Available only in secure contexts. */
interface NavigatorBadge {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/clearAppBadge) */
    clearAppBadge(): Promise<void>;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/setAppBadge) */
    setAppBadge(contents?: number): Promise<void>;
}

interface NavigatorConcurrentHardware {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/hardwareConcurrency) */
    readonly hardwareConcurrency: number;
}

interface NavigatorContentUtils {
    /**
     * Available only in secure contexts.
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/registerProtocolHandler)
     */
    registerProtocolHandler(scheme: string, url: string | URL): void;
}

interface NavigatorCookies {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/cookieEnabled) */
    readonly cookieEnabled: boolean;
}

interface NavigatorID {
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/appCodeName)
     */
    readonly appCodeName: string;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/appName)
     */
    readonly appName: string;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/appVersion)
     */
    readonly appVersion: string;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/platform)
     */
    readonly platform: string;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/product)
     */
    readonly product: string;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/productSub)
     */
    readonly productSub: string;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/userAgent) */
    readonly userAgent: string;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/vendor)
     */
    readonly vendor: string;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/vendorSub)
     */
    readonly vendorSub: string;
}

interface NavigatorLanguage {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/language) */
    readonly language: string;
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/languages) */
    readonly languages: ReadonlyArray<string>;
}

/** Available only in secure contexts. */
interface NavigatorLocks {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/locks) */
    readonly locks: LockManager;
}

interface NavigatorOnLine {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/onLine) */
    readonly onLine: boolean;
}

interface NavigatorPlugins {
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/mimeTypes)
     */
    readonly mimeTypes: MimeTypeArray;

    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/pdfViewerEnabled) */
    readonly pdfViewerEnabled: boolean;
    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/plugins)
     */
    readonly plugins: PluginArray;

    /**
     * @deprecated
     *
     * [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/javaEnabled)
     */
    javaEnabled(): boolean;
}

/** Available only in secure contexts. */
interface NavigatorStorage {
    /** [MDN Reference](https://developer.mozilla.org/docs/Web/API/Navigator/storage) */
    readonly storage: StorageManager;
}

interface NavigatorDeviceMemory {
    readonly deviceMemory: number;
}