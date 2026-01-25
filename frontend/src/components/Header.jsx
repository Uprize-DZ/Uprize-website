import { Link } from "react-router-dom";
import "./header.css";

function Header() {
  return (
    <>
      <header>
        <div className="logo">
          <svg width="309" height="309" viewBox="0 0 309 309" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M308.357 0H0V308.357H308.357V0Z" fill="#6B66FF" /> <path fillRule="evenodd" clipRule="evenodd" d="M171.601 242.051C170.43 242.094 169.25 242.115 168.057 242.115C126.033 242.115 97.834 215.335 97.834 175.227V66.2408H139.415V175.227C139.415 192.533 150.916 204.227 168.057 204.227C169.19 204.227 170.298 204.176 171.38 204.076L171.602 242.051H171.601ZM210.522 66.2421V181.235C210.522 187.236 208.139 192.993 203.895 197.237C199.651 201.481 193.895 203.865 187.892 203.865C179.326 203.865 171.601 203.865 171.601 203.865V66.2421H210.522Z" fill="white" /> </svg>
          <h3>Uprize</h3>
        </div>

        <nav>
          <ul style={{ listStyle: "none", margin: 0, padding: 0 }}>
            <li>
              <Link to="/">Home</Link>
            </li>
            <li>
              <Link to="/about">About</Link>
            </li>
            <li>
              <Link to="/contact">Contact</Link>
            </li>
            <li >
              <Link className="get-started" to="/get-started">Get Started</Link>
            </li>
          </ul>
        </nav>
      </header>
    </>
  );
}

export default Header;