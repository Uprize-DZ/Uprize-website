import axios from "axios";

export async function getServices() {
  const response = await axios.get('/services');
  return response.data;
}