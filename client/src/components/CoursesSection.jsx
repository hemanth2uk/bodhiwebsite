import { useState, useEffect } from 'react';
import api from '../api';
import CourseCard from './CourseCard';

const fallbackCourses = [
  { title: 'IIT-JEE Complete', category: 'Engineering', description: 'Comprehensive preparation for JEE Main & Advanced with expert faculty and proven methodology.', tags: ['JEE Main', 'JEE Advanced', 'Hybrid'], color: '#0b7f6e' },
  { title: 'NEET Biology Master', category: 'Medical', description: 'In-depth biology curriculum covering NCERT and beyond for NEET aspirants.', tags: ['NEET', 'Biology', 'Online'], color: '#075c50' },
  { title: 'Foundation 8-10', category: 'Foundation', description: 'Build strong fundamentals in Maths and Science for classes 8 to 10.', tags: ['CBSE', 'ICSE', 'Foundation'], color: '#14313a' },
  { title: 'Board Exam Prep', category: 'Boards', description: 'Focused preparation for Class 12 Board exams with chapter-wise tests and revision.', tags: ['Class 12', 'Boards', 'Crash Course'], color: '#1a8a55' },
  { title: 'Olympiad Training', category: 'Olympiad', description: 'Advanced problem-solving training for National and International Olympiads.', tags: ['IMO', 'NSO', 'Advanced'], color: '#b86e00' },
  { title: 'Spoken English & Personality', category: 'Life Skills', description: 'Develop communication skills, confidence, and leadership through structured modules.', tags: ['English', 'Soft Skills', 'Weekend'], color: '#c8372d' },
];

export default function CoursesSection() {
  const [courses, setCourses] = useState(fallbackCourses);

  useEffect(() => {
    (async () => {
      try {
        const { data } = await api.get('/courses');
        if (data?.length) setCourses(data);
      } catch { /* use fallback */ }
    })();
  }, []);

  return (
    <section className="sec" id="courses">
      <div className="mx">
        <div className="sec-t">
          <span className="tag">Our Courses</span>
          <h2>Explore Our Programmes</h2>
          <p>Carefully designed courses to help students excel in competitive exams and beyond.</p>
        </div>
        <div className="w-cg">
          {courses.map((c, i) => (
            <CourseCard key={i} course={c} />
          ))}
        </div>
      </div>
    </section>
  );
}
