const axios = require("axios");
const xml2json = require("xml2json");
const core = require("@actions/core");
const { context } = require("@actions/github");

const CHALLENGES = {
  "ch-1": "challenge-01",
  "ch-2": "challenge-02",
  "ch-3": "challenge-03",
  "ch-4": "challenge-04",
  "ch-5": "challenge-05",
};

const getStatsFor = (lang, task) => {
  let stats = {};

  if (lang === "javscript") {
    const payload = require(`../../../audits/${task}.json`);
    stats.numTotalTests = payload.numTotalTests;
    stats.numPassedTests = payload.numPassedTests;
  }

  if (lang === "python") {
    // JSON:: report > summary > passed | num_tests
    const data = require(`../../../audits/${task}.json`);
    const payload = data.report.summary;
    stats.numTotalTests = payload.num_tests;
    stats.numPassedTests = payload.passed;
  }

  if (lang === "php") {
    const xml = require(`../../../audits/${task}.xml`);
    const data = xml2json.toJson(xml, { object: true });
    const payload = data.testsuites.testsuite[0];
    // XML:: testsuites > testsuite > tests | errors | failures (attrs)
    stats.numErrors = payload.errors;
    stats.numTotalTests = payload.tests;
    stats.numFailedTests = payload.failures;
  }

  return stats;
};

const run = async () => {
  try {
    const task = core.getInput("challenge");
    const language = core.getInput("lang");
    const challenge = CHALLENGES[task];
    const stats = getStatsFor(language, task);

    const repo = context.repo.repo;
    const owner = context.repo.owner;

    const report = {
      repo,
      owner,
      ...stats,
      language,
      source: "jest",
      type: challenge,
    };

    const server = core.getInput("server");
    await axios.post(`${server}/entry-tests`, { report });
  } catch (error) {
    core.setFailed(error.message);
  }
};

run();
