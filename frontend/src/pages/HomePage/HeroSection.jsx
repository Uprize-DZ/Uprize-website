import { useState, useEffect } from "react";
import { motion } from "framer-motion";
import { getHeroSection } from "../../api/get-hero-section";
import './HeroSection.css';
import heroImage from '../../assets/Frame 1.svg';

function HeroSection({ itemVariants, imageVariants, containerVariants }) {
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
    <section className="hero-section">
      <div className="blur-blob top-left"></div>
      <div className="blur-blob bottom-right"></div>

      <div className="hero-section-container">
        <motion.div
          className="hero-text"
          variants={containerVariants}
          initial="hidden"
          animate="visible"
        >
          <motion.h1
            id="hero-title"
            variants={itemVariants}
          >
            {heroSection.title}
            Grow Your Potential
            <br />
            Through Design & Innovation
          </motion.h1>

          <motion.p
            id="hero-subtitle"
            variants={itemVariants}
          >
            {heroSection.subtitle}
            Helping brands rise through design, tech, and influence. We build transformative digital experiences that elevate your business.
          </motion.p>

          <motion.div
            className="hero-buttons"
            variants={itemVariants}
          >
            <button className="btn-primary">GET STARTED</button>
            <button className="btn-secondary">Show Services</button>
          </motion.div>
        </motion.div>

        <motion.div
          className="hero-image"
          variants={imageVariants}
          initial="hidden"
          animate="visible"
        >
          <img src={heroImage} alt="Uprize Hero Image" />
        </motion.div>
      </div>
    </section>
  )
}

export default HeroSection;