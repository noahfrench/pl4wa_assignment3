import { Component } from "@angular/core";
import { Order } from "./order";

import {
  HttpClient,
  HttpErrorResponse,
  HttpParams
} from "@angular/common/http";

@Component({
  selector: "app-root",
  templateUrl: "./app.component.html",
  styleUrls: ["./app.component.css"]
})
export class AppComponent {
  title = "Create Account";

  // let's create a property to store a response from the back end
  // and try binding it back to the view

  orderModel = new Order("", "");

  constructor(private http: HttpClient) {}

  senddata(data) {
    console.log(data);

    let params = JSON.stringify(data);

    //this.http.post("ngphp-post.php", data);

    //this.http.get('http://localhost/cs4640s19/ngphp-get.php?str='+encodeURIComponent(params))
    this.http
      //.get("ngphp-get.php" + params)
      .post(
        "http://localhost/pl4wa_assignment3/register/src/app/ngphp-post.php",
        data
      )
      .subscribe(
        data => {
          console.log("Got data from backend", data);
          //this.responsedata = data;
        },
        error => {
          console.log("fyck life", error);
        }
      );
  }
}
