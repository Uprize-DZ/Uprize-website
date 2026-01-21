import { useState, useEffect } from "react";
import { getServices } from "../../api/get-services";
import './Services.css';

function Services() {
  const [services, setServices] = useState([]);

  useEffect(() => {
    async function fetchServices() {
      try {
        const data = await getServices();
        setServices(data);
      } catch (error) {
        console.log("Error fetching services:", error);
      }
    }
    fetchServices();
  }, []);
  return (
    <>

    </>
  );
}

export default Services;