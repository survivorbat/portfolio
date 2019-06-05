/**
 * @param {Object} err
 * @param {Object} req
 * @param {Object} res
 * @param {Function} next
 */
export const catchError = (
  { name: errorName, status = 500, message, code },
  req,
  res,
  next
) => {
  res.status(status).json({
    message,
    code,
    errorName,
    status
  });
};

/**
 * @param {Object} req
 * @param {Object} res
 * @returns {*}
 */
export const notFound = (req, res) => res.status(404).render("error/404.twig");
