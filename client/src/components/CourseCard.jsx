export default function CourseCard({ course }) {
  const colors = ['#0b7f6e', '#075c50', '#14313a', '#b86e00', '#1a8a55', '#c8372d'];
  const color = course.color || colors[Math.floor(Math.random() * colors.length)];
  const tags = course.tags || ['Competitive', 'Hybrid'];

  return (
    <div className="w-cc">
      <div className="w-ch" style={{ background: color }}>
        {course.category || 'Course'}
      </div>
      <div className="w-cb">
        <h3>{course.title}</h3>
        <p>{course.description}</p>
        <div className="w-c2">
          {tags.map((t, i) => (
            <span key={i}>{t}</span>
          ))}
        </div>
        <a href="#courses" className="w-lk">View details →</a>
      </div>
    </div>
  );
}
