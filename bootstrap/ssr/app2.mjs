import _ from "lodash";
import dayjs from "dayjs";
import axios from "axios";
import * as Popper from "@popperjs/core";
import dom from "@left4code/tw-starter/dist/js/dom.js";
import "@left4code/tw-starter/dist/js/svg-loader.js";
import "@left4code/tw-starter/dist/js/accordion.js";
import "@left4code/tw-starter/dist/js/alert.js";
import "@left4code/tw-starter/dist/js/dropdown.js";
import "@left4code/tw-starter/dist/js/modal.js";
import "@left4code/tw-starter/dist/js/tab.js";
import { inherit, currentinherit, transparentinherit, blackinherit, whiteinherit, slateinherit, grayinherit, zincinherit, neutralinherit, stoneinherit, redinherit, orangeinherit, amberinherit, yellowinherit, limeinherit, greeninherit, emeraldinherit, tealinherit, cyaninherit, skyinherit, blueinherit, indigoinherit, violetinherit, purpleinherit, fuchsiainherit, pinkinherit, roseinherit } from "tailwindcss/colors.js";
import Chart from "chart.js/auto";
import hljs from "highlight.js";
import jsBeautify from "js-beautify";
import { createIcons, icons } from "lucide";
import { tns } from "tiny-slider/src/tiny-slider.js";
import tippy, { roundArrow } from "tippy.js";
import Litepicker from "litepicker";
import TomSelect from "tom-select";
import Dropzone from "dropzone";
import Pristine from "pristinejs";
import Toastify from "toastify-js";
import "zoom-vanilla.js/dist/zoom-vanilla.min.js";
import xlsx from "xlsx";
import Tabulator from "tabulator-tables";
import "@fullcalendar/core/vdom.js";
import { Calendar } from "@fullcalendar/core";
import interactionPlugin, { Draggable } from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import SimpleBar from "simplebar";
const helpers = {
  cutText(text, length) {
    if (text.split(" ").length > 1) {
      let string = text.substring(0, length);
      let splitText = string.split(" ");
      splitText.pop();
      return splitText.join(" ") + "...";
    } else {
      return text;
    }
  },
  formatDate(date, format) {
    return dayjs(date).format(format);
  },
  capitalizeFirstLetter(string) {
    if (string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }
  },
  onlyNumber(number) {
    if (number) {
      return number.replace(/\D/g, "");
    } else {
      return "";
    }
  },
  formatCurrency(number) {
    if (number) {
      let formattedNumber = number.toString().replace(/\D/g, "");
      let rest = formattedNumber.length % 3;
      let currency = formattedNumber.substr(0, rest);
      let thousand = formattedNumber.substr(rest).match(/\d{3}/g);
      let separator;
      if (thousand) {
        separator = rest ? "." : "";
        currency += separator + thousand.join(".");
      }
      return currency;
    } else {
      return "";
    }
  },
  timeAgo(time) {
    let date = new Date(
      (time || "").replace(/-/g, "/").replace(/[TZ]/g, " ")
    ), diff = (new Date().getTime() - date.getTime()) / 1e3, dayDiff = Math.floor(diff / 86400);
    if (isNaN(dayDiff) || dayDiff < 0 || dayDiff >= 31)
      return dayjs(time).format("MMMM DD, YYYY");
    return dayDiff == 0 && (diff < 60 && "just now" || diff < 120 && "1 minute ago" || diff < 3600 && Math.floor(diff / 60) + " minutes ago" || diff < 7200 && "1 hour ago" || diff < 86400 && Math.floor(diff / 3600) + " hours ago") || dayDiff == 1 && "Yesterday" || dayDiff < 7 && dayDiff + " days ago" || dayDiff < 31 && Math.ceil(dayDiff / 7) + " weeks ago";
  },
  diffTimeByNow(time) {
    let startDate = dayjs(dayjs().format("YYYY-MM-DD HH:mm:ss").toString());
    let endDate = dayjs(
      dayjs(time).format("YYYY-MM-DD HH:mm:ss").toString()
    );
    let duration = dayjs.duration(endDate.diff(startDate));
    let milliseconds = Math.floor(duration.asMilliseconds());
    let days = Math.round(milliseconds / 864e5);
    let hours = Math.round(milliseconds % 864e5 / 36e5);
    let minutes = Math.round(milliseconds % 864e5 % 36e5 / 6e4);
    let seconds = Math.round(
      milliseconds % 864e5 % 36e5 % 6e4 / 1e3
    );
    if (seconds < 30 && seconds >= 0) {
      minutes += 1;
    }
    return {
      days: days.toString().length < 2 ? "0" + days : days,
      hours: hours.toString().length < 2 ? "0" + hours : hours,
      minutes: minutes.toString().length < 2 ? "0" + minutes : minutes,
      seconds: seconds.toString().length < 2 ? "0" + seconds : seconds
    };
  },
  isset(obj) {
    return Object.keys(obj).length;
  },
  assign(obj) {
    return JSON.parse(JSON.stringify(obj));
  },
  delay(time) {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        resolve();
      }, time);
    });
  },
  randomNumbers(from, to, length) {
    let numbers = [0];
    for (let i = 1; i < length; i++) {
      numbers.push(Math.ceil(Math.random() * (from - to) + to));
    }
    return numbers;
  },
  replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, "g"), replace);
  },
  toRGB(colors2) {
    const tempColors = Object.assign({}, colors2);
    const rgbColors = Object.entries(tempColors);
    for (const [key, value] of rgbColors) {
      if (typeof value === "string") {
        if (value.replace("#", "").length == 6) {
          const aRgbHex = value.replace("#", "").match(/.{1,2}/g);
          tempColors[key] = (opacity = 1) => `rgb(${parseInt(aRgbHex[0], 16)} ${parseInt(
            aRgbHex[1],
            16
          )} ${parseInt(aRgbHex[2], 16)} / ${opacity})`;
        }
      } else {
        tempColors[key] = helpers.toRGB(value);
      }
    }
    return tempColors;
  }
};
window._ = _;
window.helper = helpers;
window.axios = axios;
window.Popper = Popper;
window.$ = dom;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
const el = getComputedStyle(document.body);
const colors = {
  ...helpers.toRGB({
    inherit,
    currentinherit,
    transparentinherit,
    blackinherit,
    whiteinherit,
    slateinherit,
    grayinherit,
    zincinherit,
    neutralinherit,
    stoneinherit,
    redinherit,
    orangeinherit,
    amberinherit,
    yellowinherit,
    limeinherit,
    greeninherit,
    emeraldinherit,
    tealinherit,
    cyaninherit,
    skyinherit,
    blueinherit,
    indigoinherit,
    violetinherit,
    purpleinherit,
    fuchsiainherit,
    pinkinherit,
    roseinherit
  }),
  primary: (opacity = 1) => `rgb(${el.getPropertyValue("--color-primary")} / ${opacity})`,
  secondary: (opacity = 1) => `rgb(${el.getPropertyValue("--color-secondary")} / ${opacity})`,
  success: (opacity = 1) => `rgb(${el.getPropertyValue("--color-success")} / ${opacity})`,
  info: (opacity = 1) => `rgb(${el.getPropertyValue("--color-info")} / ${opacity})`,
  warning: (opacity = 1) => `rgb(${el.getPropertyValue("--color-warning")} / ${opacity})`,
  pending: (opacity = 1) => `rgb(${el.getPropertyValue("--color-pending")} / ${opacity})`,
  danger: (opacity = 1) => `rgb(${el.getPropertyValue("--color-danger")} / ${opacity})`,
  light: (opacity = 1) => `rgb(${el.getPropertyValue("--color-light")} / ${opacity})`,
  dark: (opacity = 1) => `rgb(${el.getPropertyValue("--color-dark")} / ${opacity})`,
  slate: {
    50: (opacity = 1) => `rgb(${el.getPropertyValue("--color-slate-50")} / ${opacity})`,
    100: (opacity = 1) => `rgb(${el.getPropertyValue("--color-slate-100")} / ${opacity})`,
    200: (opacity = 1) => `rgb(${el.getPropertyValue("--color-slate-200")} / ${opacity})`,
    300: (opacity = 1) => `rgb(${el.getPropertyValue("--color-slate-300")} / ${opacity})`,
    400: (opacity = 1) => `rgb(${el.getPropertyValue("--color-slate-400")} / ${opacity})`,
    500: (opacity = 1) => `rgb(${el.getPropertyValue("--color-slate-500")} / ${opacity})`,
    600: (opacity = 1) => `rgb(${el.getPropertyValue("--color-slate-600")} / ${opacity})`,
    700: (opacity = 1) => `rgb(${el.getPropertyValue("--color-slate-700")} / ${opacity})`,
    800: (opacity = 1) => `rgb(${el.getPropertyValue("--color-slate-800")} / ${opacity})`,
    900: (opacity = 1) => `rgb(${el.getPropertyValue("--color-slate-900")} / ${opacity})`
  },
  darkmode: {
    50: (opacity = 1) => `rgb(${el.getPropertyValue("--color-darkmode-50")} / ${opacity})`,
    100: (opacity = 1) => `rgb(${el.getPropertyValue("--color-darkmode-100")} / ${opacity})`,
    200: (opacity = 1) => `rgb(${el.getPropertyValue("--color-darkmode-200")} / ${opacity})`,
    300: (opacity = 1) => `rgb(${el.getPropertyValue("--color-darkmode-300")} / ${opacity})`,
    400: (opacity = 1) => `rgb(${el.getPropertyValue("--color-darkmode-400")} / ${opacity})`,
    500: (opacity = 1) => `rgb(${el.getPropertyValue("--color-darkmode-500")} / ${opacity})`,
    600: (opacity = 1) => `rgb(${el.getPropertyValue("--color-darkmode-600")} / ${opacity})`,
    700: (opacity = 1) => `rgb(${el.getPropertyValue("--color-darkmode-700")} / ${opacity})`,
    800: (opacity = 1) => `rgb(${el.getPropertyValue("--color-darkmode-800")} / ${opacity})`,
    900: (opacity = 1) => `rgb(${el.getPropertyValue("--color-darkmode-900")} / ${opacity})`
  }
};
(function() {
  if ($("#report-line-chart").length) {
    let ctx = $("#report-line-chart")[0].getContext("2d");
    new Chart(ctx, {
      type: "line",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec"
        ],
        datasets: [
          {
            label: "# of Votes",
            data: [
              0,
              200,
              250,
              200,
              700,
              550,
              650,
              1050,
              950,
              1100,
              900,
              1200
            ],
            borderWidth: 2,
            borderColor: colors.primary(0.8),
            backgroundColor: "transparent",
            pointBorderColor: "transparent",
            tension: 0.4
          },
          {
            label: "# of Votes",
            data: [
              0,
              300,
              400,
              560,
              320,
              600,
              720,
              850,
              690,
              805,
              1200,
              1010
            ],
            borderWidth: 2,
            borderDash: [2, 2],
            borderColor: $("html").hasClass("dark") ? colors.slate["400"](0.6) : colors.slate["400"](),
            backgroundColor: "transparent",
            pointBorderColor: "transparent",
            tension: 0.4
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            ticks: {
              font: {
                size: 12
              },
              color: colors.slate["500"](0.8)
            },
            grid: {
              display: false,
              drawBorder: false
            }
          },
          y: {
            ticks: {
              font: {
                size: 12
              },
              color: colors.slate["500"](0.8),
              callback: function(value, index, values) {
                return "$" + value;
              }
            },
            grid: {
              color: $("html").hasClass("dark") ? colors.slate["500"](0.3) : colors.slate["300"](),
              borderDash: [2, 2],
              drawBorder: false
            }
          }
        }
      }
    });
  }
  if ($("#report-pie-chart").length) {
    let ctx = $("#report-pie-chart")[0].getContext("2d");
    new Chart(ctx, {
      type: "pie",
      data: {
        labels: [
          "31 - 50 Years old",
          ">= 50 Years old",
          "17 - 30 Years old"
        ],
        datasets: [
          {
            data: [15, 10, 65],
            backgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            hoverBackgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            borderWidth: 5,
            borderColor: $("html").hasClass("dark") ? colors.darkmode[700]() : colors.white
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
  }
  if ($("#report-donut-chart").length) {
    let ctx = $("#report-donut-chart")[0].getContext("2d");
    new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: [
          "31 - 50 Years old",
          ">= 50 Years old",
          "17 - 30 Years old"
        ],
        datasets: [
          {
            data: [15, 10, 65],
            backgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            hoverBackgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            borderWidth: 5,
            borderColor: $("html").hasClass("dark") ? colors.darkmode[700]() : colors.white
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        cutout: "80%"
      }
    });
  }
  if ($("#report-bar-chart").length) {
    let reportBarChartData = new Array(40).fill(0).map((data, key) => {
      if (key % 3 == 0 || key % 5 == 0) {
        return Math.ceil(Math.random() * (0 - 20) + 20);
      } else {
        return Math.ceil(Math.random() * (0 - 7) + 7);
      }
    });
    let reportBarChartColor = reportBarChartData.map((data) => {
      if (data >= 8 && data <= 14) {
        return $("html").hasClass("dark") ? "#2E51BBA6" : colors.primary(0.65);
      } else if (data >= 15) {
        return $("html").hasClass("dark") ? "#2E51BB" : colors.primary();
      }
      return $("html").hasClass("dark") ? "#2E51BB59" : colors.primary(0.35);
    });
    let ctx = $("#report-bar-chart")[0].getContext("2d");
    let myBarChart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: reportBarChartData,
        datasets: [
          {
            label: "Html Template",
            barThickness: 6,
            data: reportBarChartData,
            backgroundColor: reportBarChartColor
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            ticks: {
              display: false
            },
            grid: {
              display: false
            }
          },
          y: {
            ticks: {
              display: false
            },
            grid: {
              display: false,
              drawBorder: false
            }
          }
        }
      }
    });
    setInterval(() => {
      let newData = reportBarChartData[0];
      reportBarChartData.shift();
      reportBarChartData.push(newData);
      let newColor = reportBarChartColor[0];
      reportBarChartColor.shift();
      reportBarChartColor.push(newColor);
      myBarChart.update();
    }, 1e3);
  }
  if ($("#report-bar-chart-1").length) {
    let ctx = $("#report-bar-chart-1")[0].getContext("2d");
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec"
        ],
        datasets: [
          {
            label: "Html Template",
            barThickness: 8,
            maxBarThickness: 6,
            data: [
              60,
              150,
              30,
              200,
              180,
              50,
              180,
              120,
              230,
              180,
              250,
              270
            ],
            backgroundColor: colors.primary(0.9)
          },
          {
            label: "VueJs Template",
            barThickness: 8,
            maxBarThickness: 6,
            data: [
              50,
              135,
              40,
              180,
              190,
              60,
              150,
              90,
              250,
              170,
              240,
              250
            ],
            backgroundColor: $("html").hasClass("dark") ? colors.darkmode["400"]() : colors.slate["300"]()
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            ticks: {
              font: {
                size: 11
              },
              color: colors.slate["500"](0.8)
            },
            grid: {
              display: false,
              drawBorder: false
            }
          },
          y: {
            ticks: {
              display: false
            },
            grid: {
              color: $("html").hasClass("dark") ? colors.darkmode["300"](0.8) : colors.slate["300"](),
              borderDash: [2, 2],
              drawBorder: false
            }
          }
        }
      }
    });
  }
  if ($("#report-donut-chart-1").length) {
    let ctx = $("#report-donut-chart-1")[0].getContext("2d");
    new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: ["Yellow", "Dark"],
        datasets: [
          {
            data: [15, 10, 65],
            backgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            hoverBackgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            borderWidth: 2,
            borderColor: $("html").hasClass("dark") ? colors.darkmode[700]() : colors.white
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        cutout: "83%"
      }
    });
  }
  if ($("#report-donut-chart-2").length) {
    let ctx = $("#report-donut-chart-2")[0].getContext("2d");
    new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: ["Yellow", "Dark"],
        datasets: [
          {
            data: [15, 10, 65],
            backgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            hoverBackgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            borderWidth: 2,
            borderColor: $("html").hasClass("dark") ? colors.darkmode[700]() : colors.white
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        cutout: "83%"
      }
    });
  }
  if ($("#report-donut-chart-3").length) {
    let ctx = $("#report-donut-chart-3")[0].getContext("2d");
    new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: ["Yellow", "Dark"],
        datasets: [
          {
            data: [15, 10, 65],
            backgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            hoverBackgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            borderWidth: 5,
            borderColor: $("html").hasClass("dark") ? colors.darkmode[700]() : colors.slate[200]()
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        cutout: "82%"
      }
    });
  }
  if ($(".simple-line-chart-1").length) {
    $(".simple-line-chart-1").each(function() {
      let ctx = $(this)[0].getContext("2d");
      new Chart(ctx, {
        type: "line",
        data: {
          labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec"
          ],
          datasets: [
            {
              label: "# of Votes",
              data: $(this).data("random") !== void 0 ? helpers.randomNumbers(0, 5, 12) : [
                0,
                200,
                250,
                200,
                500,
                450,
                850,
                1050,
                950,
                1100,
                900,
                1200
              ],
              borderWidth: 2,
              borderColor: $(this).data("line-color") !== void 0 ? $(this).data("line-color") : colors.primary(0.8),
              backgroundColor: "transparent",
              pointBorderColor: "transparent",
              tension: 0.4
            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            }
          },
          scales: {
            x: {
              ticks: {
                display: false
              },
              grid: {
                display: false,
                drawBorder: false
              }
            },
            y: {
              ticks: {
                display: false
              },
              grid: {
                display: false,
                drawBorder: false
              }
            }
          }
        }
      });
    });
  }
  if ($(".simple-line-chart-2").length) {
    $(".simple-line-chart-2").each(function() {
      let ctx = $(this)[0].getContext("2d");
      new Chart(ctx, {
        type: "line",
        data: {
          labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec"
          ],
          datasets: [
            {
              label: "# of Votes",
              data: $(this).data("random") !== void 0 ? helpers.randomNumbers(0, 5, 12) : [
                0,
                300,
                400,
                560,
                320,
                600,
                720,
                850,
                690,
                805,
                1200,
                1010
              ],
              borderWidth: 2,
              borderDash: [2, 2],
              borderColor: $(this).data("line-color") !== void 0 ? $(this).data("line-color") : colors.slate["300"](),
              backgroundColor: "transparent",
              pointBorderColor: "transparent"
            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            }
          },
          scales: {
            x: {
              ticks: {
                display: false
              },
              grid: {
                display: false,
                drawBorder: false
              }
            },
            y: {
              ticks: {
                display: false
              },
              grid: {
                display: false,
                drawBorder: false
              }
            }
          }
        }
      });
    });
  }
  if ($(".simple-line-chart-3").length) {
    let ctx = $(".simple-line-chart-3")[0].getContext("2d");
    new Chart(ctx, {
      type: "line",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec"
        ],
        datasets: [
          {
            label: "# of Votes",
            data: [
              0,
              200,
              250,
              200,
              700,
              550,
              650,
              1050,
              950,
              1100,
              900,
              1200
            ],
            borderWidth: 2,
            borderColor: colors.primary(0.8),
            backgroundColor: "transparent",
            pointBorderColor: "transparent",
            tension: 0.4
          },
          {
            label: "# of Votes",
            data: [
              0,
              300,
              400,
              560,
              320,
              600,
              720,
              850,
              690,
              805,
              1200,
              1010
            ],
            borderWidth: 2,
            borderDash: [2, 2],
            borderColor: $("html").hasClass("dark") ? colors.darkmode["100"]() : colors.slate["400"](),
            backgroundColor: "transparent",
            pointBorderColor: "transparent",
            tension: 0.4
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            ticks: {
              display: false
            },
            grid: {
              display: false,
              drawBorder: false
            }
          },
          y: {
            ticks: {
              display: false
            },
            grid: {
              display: false,
              drawBorder: false
            }
          }
        }
      }
    });
  }
  if ($(".simple-line-chart-4").length) {
    let ctx = $(".simple-line-chart-4")[0].getContext("2d");
    new Chart(ctx, {
      type: "line",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec"
        ],
        datasets: [
          {
            label: "# of Votes",
            data: [
              0,
              200,
              250,
              200,
              700,
              550,
              650,
              1050,
              950,
              1100,
              900,
              1200
            ],
            borderWidth: 2,
            borderColor: colors.primary(0.8),
            backgroundColor: "transparent",
            pointBorderColor: "transparent",
            tension: 0.4
          },
          {
            label: "# of Votes",
            data: [
              0,
              300,
              400,
              560,
              320,
              600,
              720,
              850,
              690,
              805,
              1200,
              1010
            ],
            borderWidth: 2,
            borderDash: [2, 2],
            borderColor: $("html").hasClass("dark") ? colors.darkmode["100"]() : colors.slate["400"](),
            backgroundColor: "transparent",
            pointBorderColor: "transparent",
            tension: 0.4
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            ticks: {
              display: false
            },
            grid: {
              display: false,
              drawBorder: false
            }
          },
          y: {
            ticks: {
              display: false
            },
            grid: {
              display: false,
              drawBorder: false
            }
          }
        }
      }
    });
  }
  if ($("#vertical-bar-chart-widget").length) {
    let ctx = $("#vertical-bar-chart-widget")[0].getContext("2d");
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug"
        ],
        datasets: [
          {
            label: "Html Template",
            barPercentage: 0.5,
            barThickness: 6,
            maxBarThickness: 8,
            minBarLength: 2,
            data: [0, 200, 250, 200, 500, 450, 850, 1050],
            backgroundColor: colors.primary()
          },
          {
            label: "VueJs Template",
            barPercentage: 0.5,
            barThickness: 6,
            maxBarThickness: 8,
            minBarLength: 2,
            data: [0, 300, 400, 560, 320, 600, 720, 850],
            backgroundColor: $("html").hasClass("dark") ? colors.darkmode["200"]() : colors.slate["300"]()
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: colors.slate["500"](0.8)
            }
          }
        },
        scales: {
          x: {
            ticks: {
              font: {
                size: 12
              },
              color: colors.slate["500"](0.8)
            },
            grid: {
              display: false,
              drawBorder: false
            }
          },
          y: {
            ticks: {
              font: {
                size: "12"
              },
              color: colors.slate["500"](0.8),
              callback: function(value, index, values) {
                return "$" + value;
              }
            },
            grid: {
              color: $("html").hasClass("dark") ? colors.slate["500"](0.3) : colors.slate["300"](),
              borderDash: [2, 2],
              drawBorder: false
            }
          }
        }
      }
    });
  }
  if ($("#horizontal-bar-chart-widget").length) {
    let ctx = $("#horizontal-bar-chart-widget")[0].getContext("2d");
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug"
        ],
        datasets: [
          {
            label: "Html Template",
            barPercentage: 0.5,
            barThickness: 6,
            maxBarThickness: 8,
            minBarLength: 2,
            data: [0, 200, 250, 200, 500, 450, 850, 1050],
            backgroundColor: colors.primary()
          },
          {
            label: "VueJs Template",
            barPercentage: 0.5,
            barThickness: 6,
            maxBarThickness: 8,
            minBarLength: 2,
            data: [0, 300, 400, 560, 320, 600, 720, 850],
            backgroundColor: $("html").hasClass("dark") ? colors.darkmode["200"]() : colors.slate["300"]()
          }
        ]
      },
      options: {
        indexAxis: "y",
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: colors.slate["500"](0.8)
            }
          }
        },
        scales: {
          x: {
            ticks: {
              font: {
                size: "12"
              },
              color: colors.slate["500"](0.8),
              callback: function(value, index, values) {
                return "$" + value;
              }
            },
            grid: {
              display: false,
              drawBorder: false
            }
          },
          y: {
            ticks: {
              font: {
                size: "12"
              },
              color: colors.slate["500"](0.8)
            },
            grid: {
              color: $("html").hasClass("dark") ? colors.slate["500"](0.3) : colors.slate["300"](),
              borderDash: [2, 2],
              drawBorder: false
            }
          }
        }
      }
    });
  }
  if ($("#stacked-bar-chart-widget").length) {
    let ctx = $("#stacked-bar-chart-widget")[0].getContext("2d");
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec"
        ],
        datasets: [
          {
            label: "Html Template",
            barPercentage: 0.5,
            barThickness: 6,
            maxBarThickness: 8,
            minBarLength: 2,
            backgroundColor: colors.primary(),
            data: helpers.randomNumbers(-100, 100, 12)
          },
          {
            label: "VueJs Template",
            barPercentage: 0.5,
            barThickness: 6,
            maxBarThickness: 8,
            minBarLength: 2,
            backgroundColor: $("html").hasClass("dark") ? colors.darkmode["200"]() : colors.slate["300"](),
            data: helpers.randomNumbers(-100, 100, 12)
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: colors.slate["500"](0.8)
            }
          }
        },
        scales: {
          x: {
            stacked: true,
            ticks: {
              font: {
                size: "12"
              },
              color: colors.slate["500"](0.8)
            },
            grid: {
              display: false,
              drawBorder: false
            }
          },
          y: {
            stacked: true,
            ticks: {
              font: {
                size: "12"
              },
              color: colors.slate["500"](0.8),
              callback: function(value, index, values) {
                return "$" + value;
              }
            },
            grid: {
              color: $("html").hasClass("dark") ? colors.slate["500"](0.3) : colors.slate["300"](),
              borderDash: [2, 2],
              drawBorder: false
            }
          }
        }
      }
    });
  }
  if ($("#stacked-bar-chart-1").length) {
    let ctx = $("#stacked-bar-chart-1")[0].getContext("2d");
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: [...Array(16).keys()],
        datasets: [
          {
            label: "Html Template",
            barPercentage: 0.5,
            barThickness: 6,
            maxBarThickness: 8,
            minBarLength: 2,
            backgroundColor: colors.primary(0.8),
            data: helpers.randomNumbers(-100, 100, 16)
          },
          {
            label: "VueJs Template",
            barPercentage: 0.5,
            barThickness: 6,
            maxBarThickness: 8,
            minBarLength: 2,
            backgroundColor: $("html").hasClass("dark") ? colors.darkmode["200"]() : colors.slate["300"](),
            data: helpers.randomNumbers(-100, 100, 16)
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            stacked: true,
            ticks: {
              font: {
                size: "12"
              },
              color: colors.slate["500"](0.8)
            },
            grid: {
              display: false,
              drawBorder: false
            }
          },
          y: {
            stacked: true,
            ticks: {
              font: {
                size: "12"
              },
              color: colors.slate["500"](0.8),
              callback: function(value, index, values) {
                return "$" + value;
              }
            },
            grid: {
              color: $("html").hasClass("dark") ? colors.slate["500"](0.3) : colors.slate["300"](),
              borderDash: [2, 2],
              drawBorder: false
            }
          }
        }
      }
    });
  }
  if ($("#line-chart-widget").length) {
    let ctx = $("#line-chart-widget")[0].getContext("2d");
    new Chart(ctx, {
      type: "line",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec"
        ],
        datasets: [
          {
            label: "Html Template",
            data: [
              0,
              200,
              250,
              200,
              500,
              450,
              850,
              1050,
              950,
              1100,
              900,
              1200
            ],
            borderWidth: 2,
            borderColor: colors.primary(),
            backgroundColor: "transparent",
            pointBorderColor: "transparent",
            tension: 0.4
          },
          {
            label: "VueJs Template",
            data: [
              0,
              300,
              400,
              560,
              320,
              600,
              720,
              850,
              690,
              805,
              1200,
              1010
            ],
            borderWidth: 2,
            borderDash: [2, 2],
            borderColor: $("html").hasClass("dark") ? colors.slate["400"](0.6) : colors.slate["400"](),
            backgroundColor: "transparent",
            pointBorderColor: "transparent",
            tension: 0.4
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: colors.slate["500"](0.8)
            }
          }
        },
        scales: {
          x: {
            ticks: {
              font: {
                size: "12"
              },
              font: colors.slate["500"](0.8)
            },
            grid: {
              display: false,
              drawBorder: false
            }
          },
          y: {
            ticks: {
              font: {
                size: "12"
              },
              color: colors.slate["500"](0.8),
              callback: function(value, index, values) {
                return "$" + value;
              }
            },
            grid: {
              color: $("html").hasClass("dark") ? colors.slate["500"](0.3) : colors.slate["300"](),
              borderDash: [2, 2],
              drawBorder: false
            }
          }
        }
      }
    });
  }
  if ($("#donut-chart-widget").length) {
    let ctx = $("#donut-chart-widget")[0].getContext("2d");
    new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: ["Html", "Vuejs", "Laravel"],
        datasets: [
          {
            data: [15, 10, 65],
            backgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            hoverBackgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            borderWidth: 5,
            borderColor: $("html").hasClass("dark") ? colors.darkmode[700]() : colors.white
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: colors.slate["500"](0.8)
            }
          }
        },
        cutout: "80%"
      }
    });
  }
  if ($("#pie-chart-widget").length) {
    let ctx = $("#pie-chart-widget")[0].getContext("2d");
    new Chart(ctx, {
      type: "pie",
      data: {
        labels: ["Html", "Vuejs", "Laravel"],
        datasets: [
          {
            data: [15, 10, 65],
            backgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            hoverBackgroundColor: [
              colors.pending(0.9),
              colors.warning(0.9),
              colors.primary(0.9)
            ],
            borderWidth: 5,
            borderColor: $("html").hasClass("dark") ? colors.darkmode[700]() : colors.white
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: colors.slate["500"](0.8)
            }
          }
        }
      }
    });
  }
})();
(function() {
  $(".source-preview").each(function() {
    let source = $(this).find("code").html();
    let replace = helpers.replaceAll(source, "HTMLOpenTag", "<");
    replace = helpers.replaceAll(replace, "HTMLCloseTag", ">");
    let originalSource = $(
      '<textarea class="absolute w-0 h-0 p-0"></textarea>'
    ).val(replace);
    $(this).append(originalSource);
    if ($(this).find("code").hasClass("javascript")) {
      replace = jsBeautify(replace);
    } else {
      replace = jsBeautify.html(replace);
    }
    replace = helpers.replaceAll(replace, "<", "&lt;");
    replace = helpers.replaceAll(replace, ">", "&gt;");
    $(this).find("code").html(replace);
  });
  hljs.highlightAll();
})();
(function() {
  createIcons({
    icons,
    "stroke-width": 1.5,
    nameAttr: "data-lucide"
  });
  window.lucide = {
    createIcons,
    icons
  };
})();
(function() {
  if ($(".tiny-slider").length) {
    $(".tiny-slider").each(function() {
      this.tns = tns({
        container: this,
        slideBy: "page",
        mouseDrag: true,
        autoplay: true,
        controls: false,
        nav: false,
        speed: 500
      });
    });
  }
  if ($(".tiny-slider-navigator").length) {
    $(".tiny-slider-navigator").each(function() {
      $(this).on("click", function() {
        if ($(this).data("target") == "prev") {
          $("#" + $(this).data("carousel"))[0].tns.goTo("prev");
        } else {
          $("#" + $(this).data("carousel"))[0].tns.goTo("next");
        }
      });
    });
  }
  if ($(".single-item").length) {
    $(".single-item").each(function() {
      tns({
        container: this,
        slideBy: "page",
        mouseDrag: true,
        autoplay: false,
        controls: true,
        nav: false,
        speed: 500
      });
    });
  }
  if ($(".multiple-items").length) {
    $(".multiple-items").each(function() {
      tns({
        container: this,
        slideBy: "page",
        mouseDrag: true,
        autoplay: false,
        controls: true,
        items: 1,
        nav: false,
        speed: 500,
        responsive: {
          600: {
            items: 3
          },
          480: {
            items: 2
          }
        }
      });
    });
  }
  if ($(".responsive-mode").length) {
    $(".responsive-mode").each(function() {
      tns({
        container: this,
        slideBy: "page",
        mouseDrag: true,
        autoplay: false,
        controls: true,
        items: 1,
        nav: true,
        speed: 500,
        responsive: {
          600: {
            items: 3
          },
          480: {
            items: 2
          }
        }
      });
    });
  }
  if ($(".center-mode").length) {
    $(".center-mode").each(function() {
      tns({
        container: this,
        mouseDrag: true,
        autoplay: false,
        controls: true,
        center: true,
        items: 1,
        nav: false,
        speed: 500,
        responsive: {
          600: {
            items: 2
          }
        }
      });
    });
  }
  if ($(".fade-mode").length) {
    $(".fade-mode").each(function() {
      tns({
        mode: "gallery",
        container: this,
        slideBy: "page",
        mouseDrag: true,
        autoplay: true,
        controls: true,
        nav: true,
        speed: 500
      });
    });
  }
})();
(function() {
  $(".tooltip").each(function() {
    let options = {
      content: $(this).attr("title")
    };
    if ($(this).data("trigger") !== void 0) {
      options.trigger = $(this).data("trigger");
    }
    if ($(this).data("placement") !== void 0) {
      options.placement = $(this).data("placement");
    }
    if ($(this).data("theme") !== void 0) {
      options.theme = $(this).data("theme");
    }
    if ($(this).data("tooltip-content") !== void 0) {
      options.content = $($(this).data("tooltip-content"))[0];
    }
    $(this).removeAttr("title");
    tippy(this, {
      arrow: roundArrow,
      animation: "shift-away",
      ...options
    });
  });
})();
(function() {
  $(".datepicker").each(function() {
    let options = {
      autoApply: false,
      singleMode: false,
      numberOfColumns: 2,
      numberOfMonths: 2,
      showWeekNumbers: true,
      format: "D MMM, YYYY",
      dropdowns: {
        minYear: 1990,
        maxYear: null,
        months: true,
        years: true
      }
    };
    if ($(this).data("single-mode")) {
      options.singleMode = true;
      options.numberOfColumns = 1;
      options.numberOfMonths = 1;
    }
    if ($(this).data("format")) {
      options.format = $(this).data("format");
    }
    if (!$(this).val()) {
      let date = dayjs().format(options.format);
      date += !options.singleMode ? " - " + dayjs().add(1, "month").format(options.format) : "";
      $(this).val(date);
    }
    new Litepicker({
      element: this,
      ...options
    });
  });
})();
(function() {
  $(".tom-select").each(function() {
    let options = {
      plugins: {
        dropdown_input: {}
      }
    };
    if ($(this).data("placeholder")) {
      options.placeholder = $(this).data("placeholder");
    }
    if ($(this).attr("multiple") !== void 0) {
      options = {
        ...options,
        plugins: {
          ...options.plugins,
          remove_button: {
            title: "Remove this item"
          }
        },
        persist: false,
        create: true,
        onDelete: function(values) {
          return confirm(
            values.length > 1 ? "Are you sure you want to remove these " + values.length + " items?" : 'Are you sure you want to remove "' + values[0] + '"?'
          );
        }
      };
    }
    if ($(this).data("header")) {
      options = {
        ...options,
        plugins: {
          ...options.plugins,
          dropdown_header: {
            title: $(this).data("header")
          }
        }
      };
    }
    new TomSelect(this, options);
  });
})();
(function() {
  Dropzone.autoDiscover = false;
  $(".dropzone").each(function() {
    let options = {
      accept: (file, done) => {
        console.log("Uploaded");
        done();
      }
    };
    if ($(this).data("single")) {
      options.maxFiles = 1;
    }
    if ($(this).data("file-types")) {
      options.accept = (file, done) => {
        if ($(this).data("file-types").split("|").indexOf(file.type) === -1) {
          alert("Error! Files of this type are not accepted");
          done("Error! Files of this type are not accepted");
        } else {
          console.log("Uploaded");
          done();
        }
      };
    }
    let dz = new Dropzone(this, options);
    dz.on("maxfilesexceeded", (file) => {
      alert("No more files please!");
    });
  });
})();
(function() {
  function onSubmit(pristine) {
    let valid = pristine.validate();
    if (valid) {
      Toastify({
        node: $("#success-notification-content").clone().removeClass("hidden")[0],
        duration: 3e3,
        newWindow: true,
        close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true
      }).showToast();
    } else {
      Toastify({
        node: $("#failed-notification-content").clone().removeClass("hidden")[0],
        duration: 3e3,
        newWindow: true,
        close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true
      }).showToast();
    }
  }
  $(".validate-form").each(function() {
    let pristine = new Pristine(this, {
      classTo: "input-form",
      errorClass: "has-error",
      errorTextParent: "input-form",
      errorTextClass: "text-danger mt-2"
    });
    pristine.addValidator(
      $(this).find('input[type="url"]')[0],
      function(value) {
        let expression = /[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
        let regex = new RegExp(expression);
        if (!value.length || value.length && value.match(regex)) {
          return true;
        }
        return false;
      },
      "This field is URL format only",
      2,
      false
    );
    $(this).on("submit", function(e) {
      e.preventDefault();
      onSubmit(pristine);
    });
  });
  const notificationFailed = document.querySelector(
    "[data-toggle-notif-failed]"
  );
  if (notificationFailed) {
    Toastify({
      node: $("#failed-notification-content").clone().removeClass("hidden")[0],
      duration: -1,
      newWindow: true,
      close: true,
      gravity: "top",
      position: "right",
      stopOnFocus: true
    }).showToast();
  }
})();
(function() {
  $("#basic-non-sticky-notification-toggle").on("click", function() {
    Toastify({
      node: $("#basic-non-sticky-notification-content").clone().removeClass("hidden")[0],
      duration: 3e3,
      newWindow: true,
      close: true,
      gravity: "top",
      position: "right",
      stopOnFocus: true
    }).showToast();
  });
  $("#basic-sticky-notification-toggle").on("click", function() {
    Toastify({
      node: $("#basic-non-sticky-notification-content").clone().removeClass("hidden")[0],
      duration: -1,
      newWindow: true,
      close: true,
      gravity: "top",
      position: "right",
      stopOnFocus: true
    }).showToast();
  });
  $("#success-notification-toggle").on("click", function() {
    Toastify({
      node: $("#success-notification-content").clone().removeClass("hidden")[0],
      duration: -1,
      newWindow: true,
      close: true,
      gravity: "top",
      position: "right",
      stopOnFocus: true
    }).showToast();
  });
  $("#notification-with-actions-toggle").on("click", function() {
    Toastify({
      node: $("#notification-with-actions-content").clone().removeClass("hidden")[0],
      duration: -1,
      newWindow: true,
      close: true,
      gravity: "top",
      position: "right",
      stopOnFocus: true
    }).showToast();
  });
  $("#notification-with-avatar-toggle").on("click", function() {
    let avatarNotification = Toastify({
      node: $("#notification-with-avatar-content").clone().removeClass("hidden")[0],
      duration: -1,
      newWindow: true,
      close: false,
      gravity: "top",
      position: "right",
      stopOnFocus: true
    }).showToast();
    $(avatarNotification.toastElement).find('[data-dismiss="notification"]').on("click", function() {
      avatarNotification.hideToast();
    });
  });
  $("#notification-with-split-buttons-toggle").on("click", function() {
    let splitButtonsNotification = Toastify({
      node: $("#notification-with-split-buttons-content").clone().removeClass("hidden")[0],
      duration: -1,
      newWindow: true,
      close: false,
      gravity: "top",
      position: "right",
      stopOnFocus: true
    }).showToast();
    $(splitButtonsNotification.toastElement).find('[data-dismiss="notification"]').on("click", function() {
      splitButtonsNotification.hideToast();
    });
  });
  $("#notification-with-buttons-below-toggle").on("click", function() {
    Toastify({
      node: $("#notification-with-buttons-below-content").clone().removeClass("hidden")[0],
      duration: -1,
      newWindow: true,
      close: true,
      gravity: "top",
      position: "right",
      stopOnFocus: true
    }).showToast();
  });
  const notificationSuccess = document.querySelector(
    "[data-toggle-notif-succes]"
  );
  if (notificationSuccess) {
    Toastify({
      node: $("#success-notification-content").clone().removeClass("hidden")[0],
      duration: 4e3,
      newWindow: true,
      close: true,
      gravity: "top",
      position: "right",
      stopOnFocus: true
    }).showToast();
  }
})();
(function() {
  if ($("#tabulator").length) {
    let filterHTMLForm = function() {
      let field = $("#tabulator-html-filter-field").val();
      let type = $("#tabulator-html-filter-type").val();
      let value = $("#tabulator-html-filter-value").val();
      table.setFilter(field, type, value);
    };
    let table = new Tabulator("#tabulator", {
      ajaxURL: "https://dummy-data.left4code.com",
      ajaxFiltering: true,
      ajaxSorting: true,
      printAsHtml: true,
      printStyled: true,
      pagination: "remote",
      paginationSize: 10,
      paginationSizeSelector: [10, 20, 30, 40],
      layout: "fitColumns",
      responsiveLayout: "collapse",
      placeholder: "No matching records found",
      columns: [
        {
          formatter: "responsiveCollapse",
          width: 40,
          minWidth: 30,
          hozAlign: "center",
          resizable: false,
          headerSort: false
        },
        {
          title: "PRODUCT NAME",
          minWidth: 200,
          responsive: 0,
          field: "name",
          vertAlign: "middle",
          print: false,
          download: false,
          formatter(cell, formatterParams) {
            return `<div>
                            <div class="font-medium whitespace-nowrap">${cell.getData().name}</div>
                            <div class="text-slate-500 text-xs whitespace-nowrap">${cell.getData().category}</div>
                        </div>`;
          }
        },
        {
          title: "IMAGES",
          minWidth: 200,
          field: "images",
          hozAlign: "center",
          vertAlign: "middle",
          print: false,
          download: false,
          formatter(cell, formatterParams) {
            return `<div class="flex lg:justify-center">
                            <div class="intro-x w-10 h-10 image-fit">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="/build/assets/images/${cell.getData().images[0]}">
                            </div>
                            <div class="intro-x w-10 h-10 image-fit -ml-5">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="/build/assets/images/${cell.getData().images[1]}">
                            </div>
                            <div class="intro-x w-10 h-10 image-fit -ml-5">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="/build/assets/images/${cell.getData().images[2]}">
                            </div>
                        </div>`;
          }
        },
        {
          title: "REMAINING STOCK",
          minWidth: 200,
          field: "remaining_stock",
          hozAlign: "center",
          vertAlign: "middle",
          print: false,
          download: false
        },
        {
          title: "STATUS",
          minWidth: 200,
          field: "status",
          hozAlign: "center",
          vertAlign: "middle",
          print: false,
          download: false,
          formatter(cell, formatterParams) {
            return `<div class="flex items-center lg:justify-center ${cell.getData().status ? "text-success" : "text-danger"}">
                            <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> ${cell.getData().status ? "Active" : "Inactive"}
                        </div>`;
          }
        },
        {
          title: "ACTIONS",
          minWidth: 200,
          field: "actions",
          responsive: 1,
          hozAlign: "center",
          vertAlign: "middle",
          print: false,
          download: false,
          formatter(cell, formatterParams) {
            let a = $(`<div class="flex lg:justify-center items-center">
                            <a class="edit flex items-center mr-3" href="javascript:;">
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                            </a>
                            <a class="delete flex items-center text-danger" href="javascript:;">
                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                            </a>
                        </div>`);
            $(a).find(".edit").on("click", function() {
              alert("EDIT");
            });
            $(a).find(".delete").on("click", function() {
              alert("DELETE");
            });
            return a[0];
          }
        },
        {
          title: "PRODUCT NAME",
          field: "name",
          visible: false,
          print: true,
          download: true
        },
        {
          title: "CATEGORY",
          field: "category",
          visible: false,
          print: true,
          download: true
        },
        {
          title: "REMAINING STOCK",
          field: "remaining_stock",
          visible: false,
          print: true,
          download: true
        },
        {
          title: "STATUS",
          field: "status",
          visible: false,
          print: true,
          download: true,
          formatterPrint(cell) {
            return cell.getValue() ? "Active" : "Inactive";
          }
        },
        {
          title: "IMAGE 1",
          field: "images",
          visible: false,
          print: true,
          download: true,
          formatterPrint(cell) {
            return cell.getValue()[0];
          }
        },
        {
          title: "IMAGE 2",
          field: "images",
          visible: false,
          print: true,
          download: true,
          formatterPrint(cell) {
            return cell.getValue()[1];
          }
        },
        {
          title: "IMAGE 3",
          field: "images",
          visible: false,
          print: true,
          download: true,
          formatterPrint(cell) {
            return cell.getValue()[2];
          }
        }
      ],
      renderComplete() {
        createIcons({
          icons,
          "stroke-width": 1.5,
          nameAttr: "data-lucide"
        });
      }
    });
    window.addEventListener("resize", () => {
      table.redraw();
      createIcons({
        icons,
        "stroke-width": 1.5,
        nameAttr: "data-lucide"
      });
    });
    $("#tabulator-html-filter-form")[0].addEventListener(
      "keypress",
      function(event) {
        let keycode = event.keyCode ? event.keyCode : event.which;
        if (keycode == "13") {
          event.preventDefault();
          filterHTMLForm();
        }
      }
    );
    $("#tabulator-html-filter-go").on("click", function(event) {
      filterHTMLForm();
    });
    $("#tabulator-html-filter-reset").on("click", function(event) {
      $("#tabulator-html-filter-field").val("name");
      $("#tabulator-html-filter-type").val("like");
      $("#tabulator-html-filter-value").val("");
      filterHTMLForm();
    });
    $("#tabulator-export-csv").on("click", function(event) {
      table.download("csv", "data.csv");
    });
    $("#tabulator-export-json").on("click", function(event) {
      table.download("json", "data.json");
    });
    $("#tabulator-export-xlsx").on("click", function(event) {
      window.XLSX = xlsx;
      table.download("xlsx", "data.xlsx", {
        sheetName: "Products"
      });
    });
    $("#tabulator-export-html").on("click", function(event) {
      table.download("html", "data.html", {
        style: true
      });
    });
    $("#tabulator-print").on("click", function(event) {
      table.print();
    });
  }
})();
(function() {
  if ($("#calendar").length) {
    if ($("#calendar-events").length) {
      new Draggable($("#calendar-events")[0], {
        itemSelector: ".event",
        eventData: function(eventEl) {
          return {
            title: $(eventEl).find(".event__title").html(),
            duration: {
              days: parseInt(
                $(eventEl).find(".event__days").text()
              )
            }
          };
        }
      });
    }
    let calendar = new Calendar($("#calendar")[0], {
      plugins: [
        interactionPlugin,
        dayGridPlugin,
        timeGridPlugin,
        listPlugin
      ],
      droppable: true,
      headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek"
      },
      initialDate: "2021-01-12",
      navLinks: true,
      editable: true,
      dayMaxEvents: true,
      events: [
        {
          title: "Vue Vixens Day",
          start: "2021-01-05",
          end: "2021-01-08"
        },
        {
          title: "VueConfUS",
          start: "2021-01-11",
          end: "2021-01-15"
        },
        {
          title: "VueJS Amsterdam",
          start: "2021-01-17",
          end: "2021-01-21"
        },
        {
          title: "Vue Fes Japan 2019",
          start: "2021-01-21",
          end: "2021-01-24"
        },
        {
          title: "Laracon 2021",
          start: "2021-01-24",
          end: "2021-01-27"
        }
      ],
      drop: function(info) {
        if ($("#checkbox-events").length && $("#checkbox-events")[0].checked) {
          $(info.draggedEl).parent().remove();
          if ($("#calendar-events").children().length == 1) {
            $("#calendar-no-events").removeClass("hidden");
          }
        }
      }
    });
    calendar.render();
  }
})();
(function() {
  if ($(".report-maps").length) {
    let initMap = function(el2) {
      var iconBase = {
        url: $("html").hasClass("dark") ? "/build/assets/images/map-marker-dark.svg" : "/build/assets/images/map-marker.svg"
      };
      var lightStyle = [
        {
          elementType: "geometry",
          stylers: [
            {
              color: "#f5f5f5"
            }
          ]
        },
        {
          elementType: "labels.icon",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#616161"
            }
          ]
        },
        {
          elementType: "labels.text.stroke",
          stylers: [
            {
              color: "#f5f5f5"
            }
          ]
        },
        {
          featureType: "administrative.land_parcel",
          elementType: "labels",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "administrative.land_parcel",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#bdbdbd"
            }
          ]
        },
        {
          featureType: "poi",
          elementType: "geometry",
          stylers: [
            {
              color: "#eeeeee"
            }
          ]
        },
        {
          featureType: "poi",
          elementType: "labels.text",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "poi",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#757575"
            }
          ]
        },
        {
          featureType: "poi.park",
          elementType: "geometry",
          stylers: [
            {
              color: "#e5e5e5"
            }
          ]
        },
        {
          featureType: "poi.park",
          elementType: "geometry.fill",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "poi.park",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#9e9e9e"
            }
          ]
        },
        {
          featureType: "road",
          elementType: "geometry",
          stylers: [
            {
              color: "#ffffff"
            }
          ]
        },
        {
          featureType: "road.arterial",
          elementType: "labels",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "road.arterial",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#757575"
            }
          ]
        },
        {
          featureType: "road.highway",
          elementType: "geometry",
          stylers: [
            {
              color: "#dadada"
            }
          ]
        },
        {
          featureType: "road.highway",
          elementType: "labels",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "road.highway",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#616161"
            }
          ]
        },
        {
          featureType: "road.local",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "road.local",
          elementType: "labels",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "road.local",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#9e9e9e"
            }
          ]
        },
        {
          featureType: "transit.line",
          elementType: "geometry",
          stylers: [
            {
              color: "#e5e5e5"
            }
          ]
        },
        {
          featureType: "transit.line",
          elementType: "geometry.fill",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "transit.station",
          elementType: "geometry",
          stylers: [
            {
              color: "#eeeeee"
            }
          ]
        },
        {
          featureType: "transit.station",
          elementType: "geometry.fill",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "water",
          elementType: "geometry",
          stylers: [
            {
              color: "#c9c9c9"
            }
          ]
        },
        {
          featureType: "water",
          elementType: "geometry.fill",
          stylers: [
            {
              color: "#e0e3e8"
            }
          ]
        },
        {
          featureType: "water",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#9e9e9e"
            }
          ]
        }
      ];
      var darkStyle = [
        {
          elementType: "geometry",
          stylers: [
            {
              color: "#242f3e"
            }
          ]
        },
        {
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#746855"
            }
          ]
        },
        {
          elementType: "labels.text.stroke",
          stylers: [
            {
              color: "#242f3e"
            }
          ]
        },
        {
          featureType: "administrative.land_parcel",
          elementType: "labels",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "administrative.land_parcel",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#bdbdbd"
            }
          ]
        },
        {
          featureType: "administrative.locality",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#d59563"
            }
          ]
        },
        {
          featureType: "poi",
          elementType: "geometry",
          stylers: [
            {
              color: "#eeeeee"
            }
          ]
        },
        {
          featureType: "poi",
          elementType: "labels.text",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "poi",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#d59563"
            }
          ]
        },
        {
          featureType: "poi.park",
          elementType: "geometry",
          stylers: [
            {
              color: "#263c3f"
            }
          ]
        },
        {
          featureType: "poi.park",
          elementType: "geometry.fill",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "poi.park",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#6b9a76"
            }
          ]
        },
        {
          featureType: "road",
          elementType: "geometry",
          stylers: [
            {
              color: "#38414e"
            }
          ]
        },
        {
          featureType: "road",
          elementType: "geometry.stroke",
          stylers: [
            {
              color: "#212a37"
            }
          ]
        },
        {
          featureType: "road",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#9ca5b3"
            }
          ]
        },
        {
          featureType: "road.arterial",
          elementType: "labels",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "road.arterial",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#757575"
            }
          ]
        },
        {
          featureType: "road.highway",
          elementType: "geometry",
          stylers: [
            {
              color: "#746855"
            }
          ]
        },
        {
          featureType: "road.highway",
          elementType: "geometry.stroke",
          stylers: [
            {
              color: "#1f2835"
            }
          ]
        },
        {
          featureType: "road.highway",
          elementType: "labels",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "road.highway",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#f3d19c"
            }
          ]
        },
        {
          featureType: "road.local",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "road.local",
          elementType: "labels",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "transit",
          elementType: "geometry",
          stylers: [
            {
              color: "#2f3948"
            }
          ]
        },
        {
          featureType: "transit.line",
          elementType: "geometry",
          stylers: [
            {
              color: "#e5e5e5"
            }
          ]
        },
        {
          featureType: "transit.line",
          elementType: "geometry.fill",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "transit.station",
          elementType: "geometry",
          stylers: [
            {
              color: "#eeeeee"
            }
          ]
        },
        {
          featureType: "transit.station",
          elementType: "geometry.fill",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "transit.station",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#d59563"
            }
          ]
        },
        {
          featureType: "water",
          elementType: "geometry",
          stylers: [
            {
              color: "#17263c"
            }
          ]
        },
        {
          featureType: "water",
          elementType: "geometry.fill",
          stylers: [
            {
              color: "#171f29"
            }
          ]
        },
        {
          featureType: "water",
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#515c6d"
            }
          ]
        },
        {
          featureType: "water",
          elementType: "labels.text.stroke",
          stylers: [
            {
              color: "#17263c"
            }
          ]
        }
      ];
      var lat = $(el2).data("center").split(",")[0];
      var long = $(el2).data("center").split(",")[1];
      var map = new google.maps.Map(el2, {
        center: new google.maps.LatLng(lat, long),
        zoom: 10,
        styles: $("html").hasClass("dark") ? darkStyle : lightStyle,
        zoomControl: true,
        zoomControlOptions: {
          position: google.maps.ControlPosition.LEFT_BOTTOM
        },
        streetViewControl: false
      });
      var infoWindow = new google.maps.InfoWindow({
        minWidth: 400,
        maxWidth: 400
      });
      axios.get($(el2).data("sources")).then(function({ data }) {
        var markersArray = data.map(function(markerElem, i) {
          var point = new google.maps.LatLng(
            parseFloat(markerElem.latitude),
            parseFloat(markerElem.longitude)
          );
          var infowincontent = '<div class="font-medium">' + markerElem.name + '</div><div class="mt-1 text-gray-600">Latitude: ' + markerElem.latitude + ", Longitude: " + markerElem.longitude + "</div>";
          var marker = new google.maps.Marker({
            map,
            position: point,
            icon: iconBase
          });
          google.maps.event.addListener(
            marker,
            "click",
            function(evt) {
              infoWindow.setContent(infowincontent);
              google.maps.event.addListener(
                infoWindow,
                "domready",
                function() {
                  $(".arrow_box").closest(".gm-style-iw-d").removeAttr("style");
                  $(".arrow_box").closest(".gm-style-iw-d").attr("style", "overflow:visible");
                  $(".arrow_box").closest(".gm-style-iw-d").parent().removeAttr("style");
                }
              );
              infoWindow.open(map, marker);
            }
          );
          return marker;
        });
        var mcOptions = {
          styles: [
            {
              width: 55,
              height: 46,
              textColor: "white",
              url: $("html").hasClass("dark") ? "/build/assets/images/map-marker-region-dark.svg" : "/build/assets/images/map-marker-region.svg",
              anchor: [0, 0]
            }
          ]
        };
        new MarkerClusterer(map, markersArray, mcOptions);
      }).catch(function(err) {
        console.log(err);
      });
    };
    $(".report-maps").each(function(key, el2) {
      google.maps.event.addDomListener(window, "load", initMap(el2));
    });
  }
})();
(function() {
  $(".chat__chat-list").children().each(function() {
    $(this).on("click", function() {
      $(".chat__box").children("div:nth-child(2)").fadeOut(300, function() {
        $(".chat__box").children("div:nth-child(1)").fadeIn(300, function(el2) {
          $(el2).removeClass("hidden").removeAttr("style");
        });
      });
    });
  });
})();
(function() {
  $("#programmatically-show-modal").on("click", function() {
    const el2 = document.querySelector("#programmatically-modal");
    const modal = tailwind.Modal.getOrCreateInstance(el2);
    modal.show();
  });
  $("#programmatically-hide-modal").on("click", function() {
    const el2 = document.querySelector("#programmatically-modal");
    const modal = tailwind.Modal.getOrCreateInstance(el2);
    modal.hide();
  });
  $("#programmatically-toggle-modal").on("click", function() {
    const el2 = document.querySelector("#programmatically-modal");
    const modal = tailwind.Modal.getOrCreateInstance(el2);
    modal.toggle();
  });
})();
(function() {
  $("#programmatically-show-slide-over").on("click", function() {
    const el2 = document.querySelector("#programmatically-slide-over");
    const slideOver = tailwind.Modal.getOrCreateInstance(el2);
    slideOver.show();
  });
  $("#programmatically-hide-slide-over").on("click", function() {
    const el2 = document.querySelector("#programmatically-slide-over");
    const slideOver = tailwind.Modal.getOrCreateInstance(el2);
    slideOver.hide();
  });
  $("#programmatically-toggle-slide-over").on("click", function() {
    const el2 = document.querySelector("#programmatically-slide-over");
    const slideOver = tailwind.Modal.getOrCreateInstance(el2);
    slideOver.toggle();
  });
})();
(function() {
  $("#programmatically-show-dropdown").on("click", function() {
    setTimeout(() => {
      const el2 = document.querySelector("#programmatically-dropdown");
      const dropdown = tailwind.Dropdown.getOrCreateInstance(el2);
      dropdown.show();
    }, 100);
  });
  $("#programmatically-hide-dropdown").on("click", function() {
    setTimeout(() => {
      const el2 = document.querySelector("#programmatically-dropdown");
      const dropdown = tailwind.Dropdown.getOrCreateInstance(el2);
      dropdown.hide();
    }, 100);
  });
  $("#programmatically-toggle-dropdown").on("click", function() {
    setTimeout(() => {
      const el2 = document.querySelector("#programmatically-dropdown");
      const dropdown = tailwind.Dropdown.getOrCreateInstance(el2);
      dropdown.toggle();
    }, 100);
  });
})();
(function() {
  $(".top-bar, .top-bar-boxed").find(".search").find("input").each(function() {
    $(this).on("focus", function() {
      $(".top-bar, .top-bar-boxed").find(".search-result").addClass("show");
    });
    $(this).on("focusout", function() {
      $(".top-bar, .top-bar-boxed").find(".search-result").removeClass("show");
    });
  });
})();
(function() {
  $("body").on("click", ".copy-code", function() {
    const content = $(this).html();
    const self = this;
    $(self).html(content.replace("Copy example code", "Copied!"));
    setTimeout(() => {
      $(self).html(content);
    }, 1500);
    const elementId = $(this).data("target");
    $(elementId).find("textarea")[0].select();
    $(elementId).find("textarea")[0].setSelectionRange(0, 99999);
    document.execCommand("copy");
  });
})();
(function() {
  $("body").on("change", ".show-code", function() {
    const elementId = $(this).data("target");
    if ($(this).is(":checked")) {
      $(elementId).find(".preview").hide();
      $(elementId).find(".source-code").fadeIn(200);
    } else {
      $(elementId).find(".preview").fadeIn(200);
      $(elementId).find(".source-code").hide();
    }
  });
})();
(function() {
  $(".side-menu").on("click", function() {
    if ($(this).parent().find("ul").length) {
      if ($(this).parent().find("ul").first()[0].offsetParent !== null) {
        $(this).find(".side-menu__sub-icon").removeClass("transform rotate-180");
        $(this).removeClass("side-menu--open");
        $(this).parent().find("ul").first().slideUp(300, function() {
          $(this).removeClass("side-menu__sub-open");
        });
      } else {
        $(this).find(".side-menu__sub-icon").addClass("transform rotate-180");
        $(this).addClass("side-menu--open");
        $(this).parent().find("ul").first().slideDown(300, function() {
          $(this).addClass("side-menu__sub-open");
        });
      }
    }
  });
})();
(function() {
  if ($(".mobile-menu .scrollable").length) {
    new SimpleBar($(".mobile-menu .scrollable")[0]);
  }
  $(".mobile-menu-toggler").on("click", function() {
    if ($(".mobile-menu").hasClass("mobile-menu--active")) {
      $(".mobile-menu").removeClass("mobile-menu--active");
    } else {
      $(".mobile-menu").addClass("mobile-menu--active");
    }
  });
  $(".mobile-menu").find(".menu").on("click", function() {
    if ($(this).parent().find("ul").length) {
      if ($(this).parent().find("ul").first()[0].offsetParent !== null) {
        $(this).find(".menu__sub-icon").removeClass("transform rotate-180");
        $(this).parent().find("ul").first().slideUp(300, function() {
          $(this).removeClass("menu__sub-open");
        });
      } else {
        $(this).find(".menu__sub-icon").addClass("transform rotate-180");
        $(this).parent().find("ul").first().slideDown(300, function() {
          $(this).addClass("menu__sub-open");
        });
      }
    }
  });
})();
(function() {
  let initTooltips = function tooltips() {
    $(".side-menu").each(function() {
      if (this._tippy == void 0) {
        let content = $(this).find(".side-menu__title").html().replace(/<[^>]*>?/gm, "").trim();
        tippy(this, {
          content,
          arrow: roundArrow,
          animation: "shift-away",
          placement: "right"
        });
      }
      if ($(window).width() <= 1260 || $(this).closest(".side-nav").hasClass("side-nav--simple")) {
        this._tippy.enable();
      } else {
        this._tippy.disable();
      }
    });
    return tooltips;
  }();
  window.addEventListener("resize", () => {
    initTooltips();
  });
})();
(function() {
  const closeCountdownText = document.querySelector("[data-close-countdown]");
  let countdownTime = 3;
  if (closeCountdownText) {
    closeCountdownText.innerHTML = 4;
    const downloadTimer = setInterval(function() {
      if (countdownTime <= 0) {
        clearInterval(downloadTimer);
      }
      closeCountdownText.innerHTML = countdownTime;
      countdownTime -= 1;
    }, 1e3);
  }
})();
(function() {
  const checkboxes = document.querySelectorAll("input[type=checkbox]");
  function handleValueCheckbox({ checkbox }) {
    const isChecked = checkbox.checked == true;
    isChecked ? checkbox.value = 1 : checkbox.value = 0;
  }
  checkboxes.forEach((checkbox) => {
    handleValueCheckbox({ checkbox });
    checkbox.addEventListener("change", (e) => {
      handleValueCheckbox({ checkbox });
    });
  });
})();
