import { Order } from "./order";

describe("Order", () => {
  it("should create an instance", () => {
    expect(
      new Order("mike", "noah@virginia.edu", 482949483923928, "", "", true)
    ).toBeTruthy();
  });
});
