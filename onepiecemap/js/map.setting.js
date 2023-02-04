$(".container").mapael({
    map: {
        name: "opw",
        zoom: {
            enabled: true,
            maxLevel: 30,
            animDuration: 220
        },
        defaultPlot: {
            text: {
                attrs: {
                    "font-family": "Itim",
                }
            }

        },
        defaultLink: {
            text: {
                attrs: {
                    "font-family": "Itim",
                }
            }

        },
        defaultArea: {
            attrs: {
                fill: "#f4f4e8"
                , stroke: "#000",
                "stroke-width": 0.3,

            },
            text: {
                "font-family": "Raleway"
            }
            , attrsHover: {
                fill: "#a4e100"
            },
            eventHandlers: {
                click: function (e, id) {
                    $(".container").trigger('zoom', {
                        area: id,
                        areaMargin: 10
                        
                    });

                    if (id == "path448") {
                        
                        
                        $('.shellstown').trigger('click');
                    }

                    if (id == "path486") {
                        
                        $('.villafusha').trigger('click');
                    }
                    if (id == "path542") {
                        
                        $('.ciudadorange').trigger('click');
                    }
                    if (id == "path530") {
                        
                        $('.syrup').trigger('click');
                    }
                    if (id == "path586") {
                        
                        $('.islagoat').trigger('click');
                    }
                    if (id == "path248") {
                        
                        $('.baratie').trigger('click');
                    }

                }
            }

        },

    },
    areas: {
        "path28": {
            attrs: {
                fill: '#f4b184',

            },

            href: "#",
            tooltip: { content: "<span style=\"font-weight:bold;\">RED LINE</span><br />" }

        },
        "path30": {
            attrs: {
                fill: '#f4b184'
            },

        },
        "path32": {
            attrs: {
                fill: '#f4b184'
            },

        },
        "path34": {
            attrs: {
                fill: '#f4b184'
            },

        },
        "path36": {
            attrs: {
                fill: '#f4b184'
            },

        },
        "path38": {
            attrs: {
                fill: '#f4b184'
            },

        },
        "path40": {
            attrs: {
                fill: '#f4b184'
            },

        },
        "path42": {
            attrs: {
                fill: '#f4b184'
            },

        },

        "path44": {
            attrs: {
                fill: '#f4b184'
            },

        },
        "path46": {
            attrs: {
                fill: '#f4b184'
            },

        },
        "path26": {
            attrs: {
                fill: '#a9d9fd'
            }
        },
        "path24": {
            attrs: {
                fill: '#a9d9fd'
            }
        },


        "path390": {
            attrs: {
                fill: '#000'
            },
            href: "#",
            tooltip: {
                content: '<div class="card"><img src="img/zou.png" style="width:100%"><div class="card-container"><h4><b>ZOU</b></h4> <p>Zou (ゾウ Zō?), también conocida como isla Fantasma (幻の島 ),es una isla localizada en el lomo de Zunesha. </p> </div></div> '
            }
        },
        "path442": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path54": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path346": {
            attrs: {
                fill: '#ffe699',
                opacity: 0.4
            }
        },
        "path444": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path452": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path684": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path674": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path678": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path664": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path694": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path652": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path636": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path670": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path648": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path672": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path676": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path686": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path666": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path682": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path630": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path632": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path452": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path454": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path458": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path548": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path510": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path490": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path598": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path502": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path492": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path564": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path610": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path588": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path546": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path540": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path570": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path544": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path550": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path494": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path582": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path556": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path496": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path508": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path552": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path538": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path608": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path522": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path526": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path534": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path584": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path576": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path612": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path568": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path594": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path606": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path578": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path500": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path562": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path560": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path590": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path572": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path596": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path602": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path574": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path464": {
            attrs: {
                fill: '#ffe699'
            }
        },
         "path450": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path614": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path460": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path462": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path554": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path580": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path506": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path448": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path456": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path514": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path486": {
            attrs: {
                fill: '#ffe599'
            },
            href: "#",
            // tooltip: {content: '<div class="card"><img src="img/villafusha.png" style="width:100%"><div class="card-container"><h4><b>Villa Foosha</b></h4> <p>Zou (ゾウ Zō?), también conocida como isla Fantasma (幻の島 ),es una isla localizada en el lomo de Zunesha. </p> </div></div> '  }
        },
        "path488": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path498": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path504": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path516": {
            attrs: {
                fill: '#ffe699'
            }
        },

        "path518": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path520": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path524": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path528": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path530": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path532": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path536": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path558": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path600": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path622": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path626": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path542": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path566": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path650": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path656": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path658": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path684": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path592": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path628": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path634": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path638": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path640": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path644": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path654": {
            attrs: {
                fill: '#ffe699',
                "opacity": 0.4
            }
        },
        "path660": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path690": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path692": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path642": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path646": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path668": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path662": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path700": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path702": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path706": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path708": {
            attrs: {
                fill: '#ffe699'
            }
        },
        "path6840": {
            attrs: {
                fill: '#ffe699'
            }
        },


    },
    plots: {

        'East': {
            type: "circle",
            size: 0,
            latitude: 15.834763,
            longitude: 245.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "East Blue",

                position: "top",
                margin: 2,
                attrs: {
                    "font-size": 10,
                    "font-family": "Itim",
                    "font-family": "onepiece",
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'North': {
            type: "circle",
            size: 0,
            latitude: 15.834763,
            longitude: 67.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "North Blue",

                position: "top",
                margin: 2,
                attrs: {
                    "font-size": 10,
                    "font-family": "Itim",
                    fill: "#000",
                    "font-family": "onepiece",
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },

        'South': {
            type: "circle",
            size: 0,
            latitude: 161.834763,
            longitude: 245.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "South Blue",

                position: "top",
                margin: 2,
                attrs: {
                    "font-size": 10,
                    "font-family": "Itim",
                    fill: "#000",
                    "font-family": "onepiece",
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },

        'West': {
            type: "circle",
            size: 0,
            latitude: 161.834763,
            longitude: 67.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent",
                "font-family": "onepiece"
            },
            text: {
                content: "West Blue",

                position: "top",
                margin: 2,
                attrs: {
                    "font-size": 10,
                    "font-family": "Itim",
                    fill: "#000",
                    "font-family": "onepiece"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },


        'IslaDawn': {
            type: "circle",
            size: 1.4,
            latitude: 41.834763,
            longitude: 292.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent",
                path: "path01"
            },
            text: {
                content: "Isla Dawn",

                position: "top",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    "font-family": "Itim",
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'VillaFuusha': {
            type: "circle",
            size: 1.4,
            latitude: 43.834763,
            longitude: 298.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
                 //stroke: '#f4f4e8',
            },
            text: {
                content: "Villa Fūsha",

                position: "right",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    "font-family": "Itim",
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 0
                }
            },
        },
        'IslaGoat': {
            type: "circle",
            size: 1.4,
            latitude: 51.834763,
            longitude: 285.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Isla Goat",
                position: "bottom",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'IslaYotsuba': {
            type: "circle",
            size: 1.4,
            latitude: 31.834763,
            longitude: 285.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Isla Yotsuba",
                position: "bottom",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'ShellsTown': {
            type: "circle",
            size: 1.4,
            latitude: 42.834763,
            longitude: 275.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Shells Town",
                position: "bottom",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'IslasOrgan': {
            type: "circle",
            size: 1.4,
            latitude: 54.834763,
            longitude: 258.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Islas Organ",
                position: "left",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'CiudadOrange': {
            type: "circle",
            size: 1.4,
            latitude: 63.834763,
            longitude: 258.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Orange Town",
                position: "bottom",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'Syrup': {
            type: "circle",
            size: 1.4,
            latitude: 73.834763,
            longitude: 238.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Syrup Village ",
                position: "bottom",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'Baratie': {
            type: "circle",
            size: 1.4,
            latitude: 78.834763,
            longitude: 219.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Baratie",
                position: "bottom",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'IslasConomi': {
            type: "circle",
            size: 1.4,
            latitude: 53.834763,
            longitude: 211.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Islas Conomi",
                position: "left",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'Loguetown': {
            type: "circle",
            size: 1.4,
            latitude: 83.834763,
            longitude: 182.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Loguetown",
                position: "left",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'IslasPolestar': {
            type: "square",
            size: 1.4,
            latitude: 77.834763,
            longitude: 185.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Islas Polestar",
                position: "top",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'ReverseMountain': {
            type: "circle",
            size: 1.4,
            latitude: 94.834763,
            longitude: 156.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Reverse Mountain",
                position: "top",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'CabosGemelos': {
            type: "circle",
            size: 1.4,
            latitude: 100.834763,
            longitude: 170.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Cabos Gemelos",
                position: "left",
                margin: 2,
                attrs: {
                    "font-size": 3,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'IslaCactus': {
            type: "circle",
            size: 1.4,
            latitude: 102.834763,
            longitude: 185.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Isla de los Cactus",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 2.8,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'WhiskeyPeak': {
            type: "circle",
            size: 0.8,
            latitude: 99.834763,
            longitude: 185.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Whiskey Peak",
                position: "top",
                margin: 1.5,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
        },
        'LittleGarden': {
            type: "circle",
            size: 1.4,
            latitude: 101.834763,
            longitude: 195.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Little Garden",
                position: "top",
                margin: 2.5,
                attrs: {
                    "font-size": 2.8,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Drum': {
            type: "circle",
            size: 1.4,
            latitude: 100.834763,
            longitude: 204.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Drum",
                position: "top",
                margin: 1.5,
                attrs: {
                    "font-size": 2.8,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'IslaSandy': {
            type: "circle",
            size: 1.4,
            latitude: 99.834763,
            longitude: 217.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Isla Sandy",
                position: "bottom",
                margin: 1.5,
                attrs: {
                    "font-size": 2.9,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Arabasta': {
            type: "circle",
            size: 1.4,
            latitude: 95.834763,
            longitude: 217.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Arabasta",
                position: "top",
                margin: 1.5,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Jaya': {
            type: "circle",
            size: 1.4,
            latitude: 103.834763,
            longitude: 231.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Jaya",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Mocktown': {
            type: "circle",
            size: 0.3,
            latitude: 105.834763,
            longitude: 230.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Mock Town",
                position: "bottom",
                margin: 2,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Skypiea': {
            type: "image",
            url: "img/cloud.png",
            width: 4,
            height: 4,
            size: 1,
            latitude: 96.834763,
            longitude: 240.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Skypiea",
                position: "top",
                margin: 1,

                attrs: {
                    "font-size": 1,
                    fill: "#000",

                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'LongRingLongLand': {
            type: "circle",
            size: 1.1,
            latitude: 97.834763,
            longitude: 249.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Long Ring Long Land",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Water7': {
            type: "circle",
            size: 1.1,
            latitude: 96.834763,
            longitude: 262.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Water Seven",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'EniesLobby': {
            type: "circle",
            size: 1.1,
            latitude: 102.834763,
            longitude: 274.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Enies Lobby",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'FlorianTriangle': {
            type: "circle",
            size: 1.1,
            latitude: 90.834763,
            longitude: 274.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Florian Triangle ",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Sabaody': {
            type: "circle",
            size: 1.1,
            latitude: 94.834763,
            longitude: 297.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Archipiélago Sabaody",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'IslaGyojin': {
            type: "image",
            url: "img/gyojinicon.png",
            width: 4,
            height: 4,
            size: 1,
            latitude: 103.834763,
            longitude: 312.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Isla Gyojin" + "\n" + "Debajo del Red Line",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
            eventHandlers: {
                click: function () {
                    alert("gyojiiiin");
                }
            }
        },
        'PunkHazard': {
            type: "circle",
            size: 0.9,
            latitude: 95.834763,
            longitude: 38.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Punk Hazard",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'SalidaGyojin': {
            type: "circle",
            size: 0.9,
            latitude: 96.834763,
            longitude: 8.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Dressrosa': {
            type: "circle",
            size: 0.9,
            latitude: 102.834763,
            longitude: 48.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Dressrosa",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Greenbit': {
            type: "circle",
            size: 0.9,
            latitude: 95.834763,
            longitude: 52.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Green Bit",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Zou': {
            type: "circle",
            size: 0.9,
            latitude: 98.834763,
            longitude: 60.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Zou",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Tottoland': {
            type: "circle",
            size: 0.9,
            latitude: 103.834763,
            longitude: 73.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Tottoland",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Wano': {
            type: "circle",
            size: 0.9,
            latitude: 94.834763,
            longitude: 85.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "Wano",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Pone1': {
            type: "image",
            url: "img/red.png",
            width: 3,
            height: 3,
            size: 1,
            latitude: 94.834763,
            longitude: 127.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
            eventHandlers: {
                // click: function () {
                //     alert("gyojiiiin");
                // } 
            }
        },
        'Pone2': {
            type: "image",
            url: "img/red.png",
            width: 3,
            height: 3,
            size: 1,
            latitude: 103.834763,
            longitude: 121.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
            eventHandlers: {
                // click: function () {
                //     alert("gyojiiiin");
                // } 
            }
        },
        'Pone3': {
            type: "image",
            url: "img/red.png",
            width: 3,
            height: 3,
            size: 1,
            latitude: 106.834763,
            longitude: 132.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
            eventHandlers: {
                // click: function () {
                //     alert("gyojiiiin");
                // } 
            }
        },
        'Pone4': {
            type: "image",
            url: "img/red.png",
            width: 3,
            height: 3,
            size: 1,
            latitude: 98.834763,
            longitude: 137.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
            eventHandlers: {
                // click: function () {
                //     alert("gyojiiiin");
                // } 
            }
        },
        'Raftel': {
            type: "circle",
            width: 3,
            height: 3,
            size: 1,
            latitude: 100.834763,
            longitude: 129.580991,
            attrs: {
                fill: "#000",
               "stroke-width": 0.5,
                "stroke-linejoin": "round",
                stroke: "transparent"
            },
            text: {
                content: "",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            },
            eventHandlers: {
                // click: function () {
                //     alert("gyojiiiin");
                // } 
            }
        },
        'Grandline1': {
            type: "circle",
            size: 0,
            latitude: 86.834762,
            longitude: 171.580990,
            attrs: {
                fill: "#000",
                stroke: '#f4f4e8',
                "stroke-width": 0.5,
                "stroke-linejoin": "round"
            },
            text: {
                content: "",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Grandline2': {
            type: "circle",
            size: 0,
            latitude: 86.834763,
            longitude: 310.580992,
            attrs: {
                fill: "#000",
                stroke: '#f4f4e8',
                "stroke-width": 0.5,
                "stroke-linejoin": "round"
            },
            text: {
                content: "",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Grandline3': {
            type: "circle",
            size: 0,
            latitude: 110.834763,
            longitude: 165.580990,
            attrs: {
                fill: "#000",
                stroke: '#f4f4e8',
                "stroke-width": 0.5,
                "stroke-linejoin": "round"
            },
            text: {
                content: "",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Grandline4': {
            type: "circle",
            size: 0,
            latitude: 110.834760,
            longitude: 310.580992,
            attrs: {
                fill: "#000",
                stroke: '#f4f4e8',
                "stroke-width": 0.5,
                "stroke-linejoin": "round"
            },
            text: {
                content: "",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Grandline5': {
            type: "circle",
            size: 0,
            latitude: 86.834761,
            longitude: 128.580990,
            attrs: {
                fill: "#000",
                stroke: '#f4f4e8',
                "stroke-width": 0.5,
                "stroke-linejoin": "round"
            },
            text: {
                content: "",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Grandline6': {
            type: "circle",
            size: 0,
            latitude: 86.834762,
            longitude: 13.580990,
            attrs: {
                fill: "#000",
                stroke: '#f4f4e8',
                "stroke-width": 0.5,
                "stroke-linejoin": "round"
            },
            text: {
                content: "",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Grandline7': {
            type: "circle",
            size: 0,
            latitude: 110.834763,
            longitude: 136.580990,
            attrs: {
                fill: "#000",
                stroke: '#f4f4e8',
                "stroke-width": 0.5,
                "stroke-linejoin": "round"
            },
            text: {
                content: "",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'Grandline8': {
            type: "circle",
            size: 0,
            latitude: 110.834761,
            longitude: 11.580990,
            attrs: {
                fill: "#000",
                stroke: '#f4f4e8',
                "stroke-width": 0.5,
                "stroke-linejoin": "round"
            },
            text: {
                content: "",
                position: "top",
                margin: 1,
                attrs: {
                    "font-size": 1,
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'GLT1': {
            type: "circle",
            size: 0,
            latitude: 89.834761,
            longitude: 75.580990,
            attrs: {
                fill: "#000",
                stroke: '#f4f4e8',
                "stroke-width": 0.5,
                "stroke-linejoin": "round"
            },
            text: {
                content: "GRAND LINE",
                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 3.5,
                    "font-family": "onepiece",
                    fill: "#000"
                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },
        'GLT2': {
            type: "circle",
            size: 0,
            latitude: 89.834761,
            longitude: 251.580990,
            attrs: {
                fill: "#000",
                stroke: '#f4f4e8',
                "stroke-width": 0.5,
                "stroke-linejoin": "round"
            },
            text: {
                content: "GRAND LINE",

                position: "bottom",
                margin: 1,
                attrs: {
                    "font-size": 3.5,
                    "font-family": "onepiece",
                    fill: "#000",

                },
                attrsHover: {
                    fill: "#000",
                    "stroke-width": 1,
                    animDuration: 300
                }
            }
        },




    }
    ,
    links: {
        'ruta1': {

            factor: -0.3
            // The source and the destination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["VillaFuusha", "IslaGoat"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { //content: "Primer viaje de Luffy. Luffy llega a la Isla Goat en un barril, proveniente de la Isla de Dawn. Una vez allí, Luffy ayudó a Koby a escapar de Alvida, derrotándola de un solo golpe." 
            }
        },
        'ruta2': {

            factor: -0.3
            // The source and the destination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["IslaGoat", "ShellsTown"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { //content: "Luffy y Koby se van de la isla a bordo de un nuevo bote y se dirigen hacia Shells Town en busca de Roronoa Zoro." 
            }
        },
        'ruta3': {

            factor: -0.3
            // The source and the destination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["ShellsTown", "CiudadOrange"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { //content: "Luffy y Koby logran liberar a Zoro de las manos del Capitán Morgan, Helmeppo y la marina. Luffy y Zoro navegan por el mar en un bote, hacia la Ciudad Orange." 
            }
        },
        'ruta4': {

            factor: -0.3
            // The source and the destination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["CiudadOrange", "Syrup"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { //content: "Luffy derrota a Buggy, aparece Nami que se une temporalmente, navegan en bote habiendo conseguido un mapa del Grand Line. Continuán su viaje." 
            }
        },
        'ruta5': {

            factor: -0.3
            // The source and the destination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Syrup", "Baratie"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { // content: "Luffy, Zoro y Nami llegan a la Villa Syrup en busca de un barco y es ahí donde se encuentran con Usopp. Derrotan a los piratas gato negro y su líder Kuro y salvan a Kaya amiga de Usopp. Kaya les regala a Going Merry y Usopp se une a la tripulación, así continuán su viaje." 
            }
        },
        'ruta6': {

            factor: -0.3
            // The source and the destination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Baratie", "IslasConomi"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta7': {

            factor: -0.3
            // The source and the destination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["IslasConomi", "Loguetown"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta8': {

            factor: -0.3
            // The source and the destination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Loguetown", "ReverseMountain"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta9': {

            factor: -0.3
            // The source and the destination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["ReverseMountain", "CabosGemelos"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta10': {

            factor: -0.3
            // The source and the destination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["CabosGemelos", "IslaCactus"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta11': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["IslaCactus", "LittleGarden"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta12': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["LittleGarden", "Drum"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta13': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Drum", "IslaSandy"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta14': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["IslaSandy", "Jaya"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta15': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Jaya", "Skypiea"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta16': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Skypiea", "LongRingLongLand"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta17': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["LongRingLongLand", "Water7"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta18': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Water7", "EniesLobby"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta19': {

            factor: 0.5
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["EniesLobby", "Water7"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta20': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Water7", "FlorianTriangle"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta21': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["FlorianTriangle", "Sabaody"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta22': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Sabaody", "IslaGyojin"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta23': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["SalidaGyojin", "PunkHazard"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta24': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["PunkHazard", "Dressrosa"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta25': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Dressrosa", "Greenbit"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta26': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Greenbit", "Zou"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta27': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Zou", "Tottoland"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta28': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Tottoland", "Wano"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta29': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Pone1", "Raftel"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
                "stroke-opacity": 0.4,
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta30': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Pone2", "Raftel"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
                "stroke-opacity": 0.4,
                "stroke-opacity": 0.4,
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta31': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Pone3", "Raftel"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
                "stroke-opacity": 0.4,
            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'ruta32': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Pone4", "Raftel"]
            , attrs: {
                "stroke-width": 0.7,
                stroke: "#ff0000",
                "stroke-opacity": 0.4,

            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "Link" }
        },
        'GRANDLINE1': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Grandline1", "Grandline2"]
            , attrs: {
                "stroke-width": 1.5,
                stroke: "#ff0000",
                "stroke-opacity": 0.4,

            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "CALM BELT" }
        },
        'GRANDLINE2': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Grandline3", "Grandline4"]
            , attrs: {
                "stroke-width": 1.5,
                stroke: "#ff0000",
                "stroke-opacity": 0.4,

            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "CALM BELT" }
        },
        'GRANDLINE3': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Grandline5", "Grandline6"]
            , attrs: {
                "stroke-width": 1.5,
                stroke: "#ff0000",
                "stroke-opacity": 0.4,

            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "CALM BELT" }
        },
        'GRANDLINE4': {

            factor: -0.4
            // The source and the desstination of the link can be set with a latitude and a longitude or a x and a y ...
            , between: ["Grandline7", "Grandline8"]
            , attrs: {
                "stroke-width": 1.5,
                stroke: "#ff0000",
                "stroke-opacity": 0.4,

            },
            attrsHover: {
                stroke: "#a4e100"
            }
            , tooltip: { content: "CALM BELT" }
        },
    }
});