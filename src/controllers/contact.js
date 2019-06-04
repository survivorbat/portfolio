/**
 * @param {Object} req
 * @param {Object} res
 * @param {Function} next
 * @returns {Promise<void|undefined>}
 */
export const contactPage = async (req, res, next) =>
  res.status(200).render("contact/index.twig");
