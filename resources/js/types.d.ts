export {};

declare global {
    interface QuoteQuizUserResource {
        uuid: string;
        name: string;
    }

    interface ZeurMeisterResource {
        name: string;
    }

    interface DesCountResource {
        name: string;
        des_count: number;
    }
}
