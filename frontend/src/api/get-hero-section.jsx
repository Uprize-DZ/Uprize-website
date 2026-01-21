import axios from "axios";

export async function getHeroSection() {
  const response = await axios.get('/home-heroes')
  return response.data;
} 