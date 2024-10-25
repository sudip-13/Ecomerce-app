import './bootstrap';
import { auth, provider, signInWithPopup } from "./firebase-config";
import axios from "axios";
import Alpine from 'alpinejs';
document.getElementById("google-signin-btn").addEventListener("click", async () => {
    try {
        const result = await signInWithPopup(auth, provider);
        const idToken = await result.user.getIdToken();

        // Send token to Laravel backend for verification
        const response = await axios.post("/google-signin", {
            idToken: idToken,
        });

        console.log("Login successful:", response.data);
        window.location.href = "/home"; // Redirect on success
    } catch (error) {
        console.error("Error during sign-in:", error);
    }
});
window.Alpine = Alpine;

Alpine.start();
