/**
 * @returns {boolean}
 */
export const isProd = () => process.env.NODE_ENV === "prod";

/**
 * @returns {boolean}
 */
export const isDev = () => !isProd();

/**
 * @returns {number}
 */
export const getPort = () => process.env.PORT || 3000;
