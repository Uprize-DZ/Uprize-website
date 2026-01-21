import { useState, useEffect } from "react";
import { getHeroSection } from "../../api/get-hero-section";

function HeroSection() {
  const [heroSection, setHeroSection] = useState([]);

  useEffect(() => {
    async function fetchHeroSection() {
      try {
        const response = await getHeroSection();
        setHeroSection(response);
      }
      catch (error) {
        console.log('error fetching hero section', error);
      }
    }
    fetchHeroSection();
  }, []);

  return (
    <>
      <div>
        <h1>{heroSection.title}</h1>
        <p>{heroSection.subtitle}</p>
      </div>
    </>
  )
}

export default HeroSection;