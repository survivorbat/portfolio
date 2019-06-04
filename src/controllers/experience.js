/**
 * @param {Object} req
 * @param {Object} res
 * @param {Function} next
 * @returns {Promise<void|undefined>}
 */
export const experiencePage = async (req, res, next) =>
  res.status(200).render("experience/index.twig");
