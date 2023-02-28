declare namespace App.Modules.Core.Data.Authentication {
export type LoginRequest = {
email: string;
password: string;
};
export type LoginResponse = {
id: string;
email: string;
password: string;
created_at: string;
updated_at: string;
deleted_at: string | null;
};
}
