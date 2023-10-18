import { StorageService } from './storage.js';
export const Auth = {
    login(loginData, remember) {
        StorageService.saveLoginData(loginData, remember);
    },
    logout() {
		StorageService.removeLoginData();
    },
    CheckLogin() {
        let token = StorageService.getToken();
        if(token){
            return true;
        }
        return false;
    },
}