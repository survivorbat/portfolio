import showdown from "showdown";
import { readFile } from "../utils/asyncfs";
const mdParser = new showdown.Converter();

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

/**
 * @param {string} file
 * @returns {Promise<string>}
 */
export const fetchContent = async file => {
  const content = await readFile(`./content/${file}.md`, "utf-8");
  return mdParser.makeHtml(content);
};
