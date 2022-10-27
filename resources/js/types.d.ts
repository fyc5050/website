export {};

declare global {
    interface UserResource {
        uuid: string;
        name: string;
    }

    interface ZeurMeisterResource {
        name: string;
    }
}
