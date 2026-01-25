import Header from "../../components/Header.jsx";
import HeroSection from "./HeroSection.jsx";
import Services from "./Services.jsx";
import TrustedBy from "./TrustedBy.jsx";

function HomePage() {
  const containerVariants = {
    hidden: {},
    visible: {
      transition: {
        staggerChildren: 0.15,
      },
    },
  };
  const itemVariants = {
    hidden: {
      opacity: 0,
      y: 30,
    },
    visible: {
      opacity: 1,
      y: 0,
      transition: {
        duration: 0.6,
        ease: "easeOut",
      },
    },
  };
  const imageVariants = {
    hidden: {
      opacity: 0,
      x: 60,
    },
    visible: {
      opacity: 1,
      x: 0,
      transition: {
        duration: 0.8,
        ease: "easeOut",
      },
    },
  };

  return (
    <>
      <Header />
      <main>
        <HeroSection
          itemVariants={itemVariants}
          imageVariants={imageVariants}
          containerVariants={containerVariants}
        />
        <Services />
        <TrustedBy />
      </main>
    </>
  )
}

export default HomePage;