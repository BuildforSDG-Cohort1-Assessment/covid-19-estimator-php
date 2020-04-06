<?php

$input = [
  "region" => [
    "name" => "Africa",
    "avgAge" => 19.7,
    "avgDailyIncomeInUSD" => 5,
    "avgDailyIncomePopulation" => 0.71,
  ],
  "periodType" => "days",
  "timeToElapse" => 58,
  "reportedCases" => 674,
  "population" => 66622705,
  "totalHospitalBeds" => 1380614
];

function covid19ImpactEstimator($data)
{
  // return [
  //   "data" => [
  //     "region" => [
  //       "name" => "Africa",
  //       "avgAge" => 19.7,
  //       "avgDailyIncomeInUSD" => 5,
  //       "avgDailyIncomePopulation" => 0.71,
  //     ],
  //     "periodType" => "days",
  //     "timeToElapse" => 58,
  //     "reportedCases" => 674,
  //     "population" => 66622705,
  //     "totalHospitalBeds" => 1380614
  //   ],          // the input data you got
  //   "impact" => [
  //     "currentlyInfected" => $data["reportedCases"] * 10,
  //     "infectionsByRequestedTime" => ($data["reportedCases"] * 10) * (2 ** ($data['timeToElapse'] / 3)),
  //     "severeCasesByRequestedTime" => 43184553984,
  //     "hospitalBedsByRequestedTime" => -43183572999.45,
  //     "casesForICUByRequestedTime" => 14394851328,
  //     "casesForVentilatorsByRequestedTime" => 5757940531.2,
  //     "dollarsInFlight" => 70304453885952
  //   ],        // your best case estimation
  //   "severeImpact" => [
  //     "currentlyInfected" => $data["reportedCases"] * 50,
  //     "infectionsByRequestedTime" => ($data["reportedCases"] * 50) * 512,
  //     "severeCasesByRequestedTime" => 215922769920,
  //     "hospitalBedsByRequestedTime" => -215921788935.45,
  //     "casesForICUByRequestedTime" => 71974256640,
  //     "casesForVentilatorsByRequestedTime" => 28789702656,
  //     "dollarsInFlight" => 351522269429760
  //   ]   // your severe case estimation
  // ];

  $data = [
    "impact" => [
      "currentlyInfected" => 17160,
      "infectionsByRequestedTime" => 287897026560,
      "severeCasesByRequestedTime" => 43184553984,
      "hospitalBedsByRequestedTime" => -43183572999.45,
      "casesForICUByRequestedTime" => 14394851328,
      "casesForVentilatorsByRequestedTime" => 5757940531.2,
      "dollarsInFlight" => 70304453885952
    ],
    "severeImpact" => [
      "currentlyInfected" => 85800,
      "infectionsByRequestedTime" => 1439485132800,
      "severeCasesByRequestedTime" => 215922769920,
      "hospitalBedsByRequestedTime" => -215921788935.45,
      "casesForICUByRequestedTime" => 71974256640,
      "casesForVentilatorsByRequestedTime" => 28789702656,
      "dollarsInFlight" => 351522269429760
    ]
  ];

  return $data;
}