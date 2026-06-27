"use strict";

const encodedPassword = "VGgxNV8xNV81VFIwbjY=";

document.addEventListener("DOMContentLoaded", () => {
  const showPasswordButton = document.querySelector("#showPasswordButton");
  const passwordOutput = document.querySelector("#passOutput");

  if (!showPasswordButton || !passwordOutput) {
    return;
  }

  showPasswordButton.addEventListener("click", () => {
    try {
      passwordOutput.textContent = window.decodeBase64(encodedPassword);
    } catch (error) {
      passwordOutput.textContent = "Nie udało się odczytać hasła.";
      console.error(error);
    }
  });
});