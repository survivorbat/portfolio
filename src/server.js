import express from "express";
import logger from "morgan";
import router from "./router";
import twig from "twig";
import sass from "node-sass-middleware";
import path from "path";

const app = express();
app.use(logger("combined"));
app.use(
  sass({
    src: path.join(__dirname, "/resources/scss"),
    dest: path.join(__dirname, "public/css"),
    debug: process.env.NODE_ENV === "dev",
    outputStyle: "compressed",
    prefix: "/css"
  })
);
app.use(express.static(path.join(__dirname, "/public")));

app.set("view engine", "twig");
app.set("twig options", {
  allow_async: true,
  strict_variables: true
});

app.use(router);

app.listen(process.env.PORT || 3000, err => {
  if (!err) {
    console.log(`Application is running on port ${process.env.PORT || 3000}`);
  } else {
    console.error("Error while bringing up application error:", err);
  }
});
