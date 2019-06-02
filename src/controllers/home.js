/**
 * @param {Object} req
 * @param {Object} res
 * @param {Function} next
 * @returns {*|void}
 */
export const homePage = async (req, res, next) =>
  res.status(200).render("home/index.twig");
