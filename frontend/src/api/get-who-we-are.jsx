import axios from "axios";

export async function getWhoWeAre() {
  const response = await axios.get('/who-we-are');
  return response.data;
}