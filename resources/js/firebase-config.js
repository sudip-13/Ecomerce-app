import { initializeApp } from "firebase/app";
import { getAuth, GoogleAuthProvider, signInWithPopup } from "firebase/auth";

// Replace these with your Firebase config values
const firebaseConfig = {
    apiKey: "",
    authDomain: "e",
    databaseURL: "https:/",
    projectId: "",
    storageBucket:"",
    messagingSenderId: "",
    appId: "",
    measurementId: ""
  };

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const provider = new GoogleAuthProvider();

export { auth, provider, signInWithPopup };
