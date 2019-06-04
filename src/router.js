import express from "express";
const router = express.Router();

import { homePage } from "./controllers/home";
import { notFound, catchError } from "./controllers/_error";
import { aboutPage } from "./controllers/about";
import { experiencePage } from "./controllers/experience";
import { projectsPage } from "./controllers/projects";
import { contactPage } from "./controllers/contact";

router.get("/", homePage);
router.get("/about", aboutPage);
router.get("/experience", experiencePage);
router.get("/projects", projectsPage);
router.get("/contact", contactPage);

router.use(catchError);
router.get("*", notFound);

export default router;
