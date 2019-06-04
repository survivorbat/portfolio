/**
 * @param {Object} req
 * @param {Object} res
 * @param {Function} next
 * @returns {Promise<void|undefined>}
 */
export const aboutPage = async (req, res, next) =>
  res.status(200).render("about/index.twig");
