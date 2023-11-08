import React from "react";
import ReactDOM from "react-dom";
import "../../css/footer.css";

function Footer() {
    return (
        <>
          <div className="footer">
            <p>© 2023 Abibas</p>
            <ul>
              <li><a href="">About Us</a></li>
              <li><a href="">Contact Us</a></li>
              <li><a href="">Find Us</a></li>
            </ul>
          </div>
        </>
      );
}

export default Footer;

if (document.getElementById("footer")) {
    ReactDOM.render(<Footer />, document.getElementById("footer"));
}
