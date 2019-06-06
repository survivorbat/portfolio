import fetch from "node-fetch";
import { fetchContent, splitArrayByFilter } from "../utils/functions";

/**
 * @param {Object} req
 * @param {Object} res
 * @param {Function} next
 * @returns {Promise<void|undefined>}
 */
export const projectsPage = async (req, res, next) => {
  const projects = await fetch(process.env.GITHUB_URL)
    .then(response => response.json())
    .catch(err => {
      console.log(err);
      return [];
    });
  const content = await fetchContent("projects");

  const sortedProjects = splitArrayByFilter(projects, e => !e.archived);

  return res.status(200).render("projects/index.twig", {
    activeProjects: sortedProjects[0],
    archivedProjects: sortedProjects[1],
    content
  });
};
