(function (global) {
  "use strict";

  function decodeBase64(value) {
    if (typeof value !== "string" || value.trim() === "") {
      throw new TypeError("Expected a non-empty Base64 string.");
    }

    try {
      if (typeof global.atob === "function") {
        return global.atob(value.trim());
      }

      if (global.Buffer) {
        return global.Buffer.from(value.trim(), "base64").toString("utf8");
      }
    } catch {
      throw new Error("Invalid Base64 value.");
    }

    throw new Error("Base64 decoding is not supported in this environment.");
  }

  global.decodeBase64 = decodeBase64;

  if (typeof module !== "undefined") {
    module.exports = { decodeBase64 };
  }
})(typeof window !== "undefined" ? window : globalThis);