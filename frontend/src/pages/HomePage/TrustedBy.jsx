import { useEffect, useState } from "react";
import { getTrustedBy } from "../../api/get-trusted-by";
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
    <>

    </>
  );
}

export default TrustedBy;