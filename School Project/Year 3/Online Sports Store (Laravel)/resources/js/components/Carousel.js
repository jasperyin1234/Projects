import React from "react";
import Slider from "react-slick";
import ReactDOM from "react-dom";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";


import carousel1 from "../../../public/images/carousel1.jpg";
import carousel2 from "../../../public/images/carousel2.jpg";
import carousel3 from "../../../public/images/carousel3.jpg";
import carousel4 from "../../../public/images/carousel4.jpg";
import carousel5 from "../../../public/images/carousel5.jpg";

function Carousel() {
    var settings = {
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        centerPadding: "50px",
    };
    return (
        <Slider {...settings}>
            <div>
                <img src={carousel1} />
            </div>
            <div>
                <img src={carousel2} />
            </div>
            <div>
                <img src={carousel3} />
            </div>
            <div>
                <img src={carousel4} />
            </div>
            <div>
                <img src={carousel5} />
            </div>
        </Slider>
    );
}

export default Carousel;

if (document.getElementById("carousel")) {
    ReactDOM.render(<Carousel />, document.getElementById("carousel"));
}
