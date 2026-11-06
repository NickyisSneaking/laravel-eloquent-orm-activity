export default function Card({ name, description }) 
{
  return (
    <div className="card">
      <h2>{name}</h2>
      <p>{description}</p>
    </div>
  );
}
