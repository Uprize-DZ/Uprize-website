import { useEffect, useState } from "react";
import { getTrustedBy } from "../../api/get-trusted-by";
import google from "../../assets/google.png";
import amazon from "../../assets/amazon.png";
import facebook from "../../assets/facebook.png";
import twitter from "../../assets/twitter.png";
import instagram from "../../assets/instagram.png";
import './TrustedBy.css';

function TrustedBy() {
  const [trustedBy, setTrustedBy] = useState([]);

  useEffect(() => {
    async function fetchTrustedBy() {
      try {
        const data = await getTrustedBy();
        setTrustedBy(data);
      } catch (error) {
        console.log("Error fetching trusted by:", error);
      }
    }
    fetchTrustedBy();
  }, []);

  return (
    <section className="trusted-by">
      <div className="trusted-by-container">
        <h2>Trusted By</h2>
        <div className="trusted-by-logos">
          {/* {trustedBy.map((logo) => (
            <img key={logo.id} src={logo.image} alt={logo.name} />
          ))} */}
          <img src={google} alt="google" />
          <img src={amazon} alt="amazon" />
          <img src={facebook} alt="facebook" />
          <img src={twitter} alt="twitter" />
          <img src={instagram} alt="instagram" />
        </div>
      </div>
    </section>
  )
}

export default TrustedBy;