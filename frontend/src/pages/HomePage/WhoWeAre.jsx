import { useEffect, useState } from "react";
import { getWhoWeAre } from "../../api/get-who-we-are";
import './WhoWeAre.css';

function WhoWeAre() {
  const [whoWeAre, setWhoWeAre] = useState([]);

  useEffect(() => {
    async function fetchWhoWeAre() {
      try {
        const whoWeAreData = await getWhoWeAre();
        setWhoWeAre(whoWeAreData);
      } catch (error) {
        console.error('Error fetching who we are:', error);
      }
    }
    fetchWhoWeAre();
  }, []);

  return (
    <div className="whoWeAre">
      <h1>Who We Are</h1>
      <div className="whoWeAre-Content">
        {/* {whoWeAre.map((whoWeAreItem, index) => (
          <div className={`whoWeAre-Item item-${index}`} key={whoWeAreItem.id}>
            <h2>{whoWeAreItem.title}</h2>
            <p>{whoWeAreItem.description}</p>
          </div>
        ))} */}
      </div>
    </div>
  );
}

export default WhoWeAre;