import { initializeApp } from "firebase/app";
import { getAuth, GoogleAuthProvider, signInWithPopup } from "firebase/auth";
async function getFirebaseConfig() {
  const response = await fetch('/firebase-config');
  const firebaseConfig = await response.json();
  
  const app = initializeApp(firebaseConfig);
  const auth = getAuth(app);
  const provider = new GoogleAuthProvider();

  return { auth, provider, signInWithPopup };
}

export { getFirebaseConfig };
