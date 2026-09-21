import express from "express";
import path from "path";

const app = express();
const PORT = 3000;

// API routes placeholder
app.get("/api/health", (req, res) => {
  res.json({ status: "ok" });
});

// Serve static files from root directory
const rootDir = process.cwd();
app.use(express.static(rootDir));

// SPA / HTML fallback for clean navigation or 404 handling
app.get("*", (req, res) => {
  const filePath = path.join(rootDir, req.path);
  // If request doesn't have an extension and doesn't exist as file, try adding .html
  if (!path.extname(req.path)) {
    const htmlPath = filePath + ".html";
    res.sendFile(htmlPath, (err) => {
      if (err) {
        res.sendFile(path.join(rootDir, "404.html"), (err404) => {
          if (err404) {
            res.status(404).send("Page not found");
          }
        });
      }
    });
  } else {
    res.sendFile(filePath, (err) => {
      if (err) {
        res.status(404).sendFile(path.join(rootDir, "404.html"));
      }
    });
  }
});

app.listen(PORT, "0.0.0.0", () => {
  console.log(`Ecobazar server running on http://0.0.0.0:${PORT}`);
});
