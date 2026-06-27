const { decodeBase64 } = require("../../js/passwordCodec");

describe("decodeBase64", () => {
  test("correctly decodes the Base64 password", () => {
    expect(decodeBase64("VGgxNV8xNV81VFIwbjY="))
      .toBe("Th15_15_5TR0n6");
  });

  test("throws an error for invalid Base64", () => {
    expect(() => decodeBase64("%%%")).toThrow("Invalid Base64 value.");
  });

  test("throws an error for empty input", () => {
    expect(() => decodeBase64("")).toThrow(
      "Expected a non-empty Base64 string."
    );
  });
});