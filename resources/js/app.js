import './bootstrap';
import { getFirebaseConfig } from "./firebase-config";
import axios from "axios";
import Alpine from 'alpinejs';
window.Alpine = Alpine;

Alpine.start();

document.getElementById("google-signin-btn").addEventListener("click", async () => {
    try {
        // Load Firebase configuration and initialize
        const { auth, provider, signInWithPopup } = await getFirebaseConfig();
        
        // Sign in with Google
        const result = await signInWithPopup(auth, provider);
        const idToken = await result.user.getIdToken();

        // Send token to Laravel backend for verification
        const response = await axios.post("/google-signin", {
            idToken: idToken,
        });

        console.log("Login successful:", response.data);
        window.location.href = "/dashboard"; // Redirect on success
    } catch (error) {
        console.error("Error during sign-in:", error);
    }
});
