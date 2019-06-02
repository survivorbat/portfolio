import express from "express";
const router = express.Router();

import { homePage } from "./controllers/home";
import { notFound, catchError } from "./controllers/_error";

router.get("/", homePage);

router.use(catchError);
router.get("*", notFound);

export default router;
