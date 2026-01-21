import axios from "axios";

export async function getTrustedBy() {
  const response = await axios.get('/trusted-by');
  return response.data;
}